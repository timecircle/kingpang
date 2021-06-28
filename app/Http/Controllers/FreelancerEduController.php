<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;

use Illuminate\Http\Request;
use App\Models\FreelancerEdu;
use Hash;
use Route;
class FreelancerEduController extends DevController
{
    protected $reg  = [
        'school'   => 'string|min:3',
        'major'    => 'string|min:3',
        'state'    => 'string|min:3',
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

        $model = FreelancerEdu::create($this->data);

        return $this->afterSave($request,$model);
    }
    ///extend resource
    function beforeSave(Request $request){
        $this->data = $request->input();
        if($request->at){
          $this->data['at'] = date('Y-m-d',strtotime($request->at));
        }
    }
    function afterSave(Request $request,FreelancerEdu $freelancerEdu){
          if($request->hasFile('doc')){
              $file = $request->doc;
              $freelancerEdu->attach($request->doc);
          }
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
    public function show(FreelancerEdu $freelancerEdu)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function edit(FreelancerEdu $freelancerEdu)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,FreelancerEdu $freelancerEdu)
    {

        $this->beforeSave($request);
        if($this->validator()->fails()) return $this->backErr();

        $freelancerEdu->update($this->data);
        return $this->afterSave($request,$freelancerEdu);

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
