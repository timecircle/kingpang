<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Auth;
class DevController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $validator,$reg;
    protected $data  = [];
    protected $mback = [];


    function back( $mback = null ){
      if($mback) $this->mback = $mback;
      return redirect()->back()->with('toastr',$this->mback);
    }

    function backErr(){
        return redirect()->back()
                    ->withErrors($this->validator())
                    ->withInput();
    }

    function validator(){
      return Validator::make($this->data,$this->reg);
    }

    function after($act){
        $this->validator  = Validator::make($this->data,$this->reg);
        if ($this->validator()->fails()) {
          return redirect()->back()
                      ->withErrors($this->validator)
                      ->withInput();
        }
        $act($this->data);
        return $this->back();
    }

}
