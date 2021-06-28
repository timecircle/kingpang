<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\Product;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\User;
use App\Classes\Search;
use Hash;
use Route;

class FreelancerController extends DevController
{
    protected $reg  = [
        'name'       => 'string|min:3',
        'job'       => 'string|min:3',
        'avatar'    => 'max:1024'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = (new search('freelancer'))->get();
        $query  =  Freelancer::search($search)->orderByDesc('created_at');

        return view('dev.freelancer.index', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dev.freelancer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->reg['password'] = ['required', 'string', 'min:6', 'confirmed'];
        $this->reg['email']  = ['unique:users'];
        $this->data   =  $request->input();

        if ($this->validator()->fails()) return $this->backErr();

        $data = $this->data;
        $data['password'] =     Hash::make($request->password);
        $data['work_email'] =   $data['email'];
        $data['user_id']    =   User::create($data)->id;

        $model = Freelancer::create($data);

        return $this->afterSave($request, $model);
    }
    ///extend resource
    function beforeSave(Request $request)
    {
        $this->data = $request->input();

        $user = User::find($request->user_id);
        if (empty($this->data['work_email'])) {
            $this->data['work_email'] =  $user->email;
        }
        $keys = $request->array_key;
        if ($keys) {
            $vals = $request->array_value;
            for ($i = 0; $i < count($keys); $i++) {
                $social[$keys[$i]] =  empty($vals[$i]) ? '' : $vals[$i];
            }
            $this->data['social'] = $social;
        }
    }
    function afterSave(Request $request, Freelancer $freelancer)
    {

        if ($request->hasFile('avatar')) {
            $freelancer->storeAvatar($request->avatar);
        }
        switch (back()->getTargetUrl()) {
            case route('auth.join'):
                return redirect()->route('freelancer.info', ['tab' => 'edu'])->with('toastr', [
                    'status' => 'success', 'message' => 'Record created!'
                ]);
                break;
            case route('freelancers.create'):

                return redirect()->route('freelancers.edit', $freelancer)->with('toastr', [
                    'status' => 'success', 'message' => 'Record created!'
                ]);

                break;
            default:
                return redirect()->back()->with('toastr', [
                    'status' => 'success', 'message' => 'Record updated!'
                ]);
                break;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function show(Freelancer $freelancer)
    {
        $query = Product::root()->inventory()
            ->whereFreelancerId($freelancer->id);

        return view(
            'page.freelancer.index',
            compact('query', 'freelancer')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function edit(Freelancer $freelancer)
    {

        return view('dev.freelancer.edit', compact('freelancer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freelancer $freelancer)
    {

        $this->beforeSave($request);
        if ($this->validator()->fails()) return $this->backErr();

        $freelancer->update($this->data);
        return $this->afterSave($request, $freelancer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freelancer $freelancer)
    {
        $freelancer->delete();
        return $this->back(['status' => 'success', 'message' => 'Record deleted!']);
    }
}
