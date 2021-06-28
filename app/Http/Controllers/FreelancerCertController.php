<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Freelancer;
use App\Models\FreelancerCert;

use Route;
use DateTime;
class FreelancerCertController extends DevController
{
    protected $reg  = [
        'certificate'  => 'string|min:3',
        'issuer'       => 'string|min:3',
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
        $model = FreelancerCert::create($this->data);

        return $this->afterSave($request,$model);
    }
    ///extend resource
    function beforeSave(Request $request){
        $this->data = $request->input();
        if($request->at){
          $this->data['at'] = date('Y-m-d',strtotime($request->at));
        }
    }

    function afterSave(Request $request,FreelancerCert $freelancerCert){
          if($request->hasFile('doc')){
            $file = $request->doc;
            $freelancerCert->attach($request->doc);
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
    public function show(Freelancer $freelancer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function edit(Freelancer $freelancer)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreelancerCert $freelancerCert)
    {
        $this->beforeSave($request);
        if($this->validator()->fails()) return $this->backErr();
        $freelancerCert->update($this->data);
        return $this->afterSave($request,$freelancerCert);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FreelancerCert $freelancerCert)
    {
        $freelancerCert->delete();
        return $this->back(['status'=>'success','message'=>'Record deleted!']);
    }



}
