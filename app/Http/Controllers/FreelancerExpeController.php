<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreelancerExpe;

use Route;
class FreelancerExpeController extends DevController
{
    protected $reg  = [
        'company'   => 'string|min:3',
        'position'  => 'string|min:3',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->beforeSave($request);

        if($this->validator()->fails()) return $this->backErr();

        $model = FreelancerExpe::create($this->data);

        return $this->afterSave($request,$model);
    }
    ///extend resource
    function beforeSave(Request $request){
        $this->data = $request->input();
        if($request->at){
          $this->data['at'] = date('Y-m-d',strtotime($request->at));
        }
    }
    function afterSave(Request $request,FreelancerExpe $freelancerExpe){

          return redirect()->back()->with('toastr',[
            'status'=>'success','message'=>'Record updated!'
          ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function show(Freelancer $freelancer)
    {
        $products = Product::root()->inventory()
            ->whereFreelancerId($freelancer->id)
            ->paginate();

        return view('page.freelancer.index',
          compact('products','freelancer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function edit(Freelancer $freelancer)
    {

        return view('dev.freelancer.edit',compact('freelancer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreelancerExpe $freelancerExpe)
    {

        $this->beforeSave($request);
        if($this->validator()->fails()) return $this->backErr();

        $freelancerExpe->update($this->data);
        return $this->afterSave($request,$freelancerExpe);

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
      return $this->back(['status'=>'success','message'=>'Record deleted!']);
    }



}
