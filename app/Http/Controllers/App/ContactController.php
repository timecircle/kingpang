<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Freelancer;

class ContactController extends Controller
{

  public function send(Freelancer $freelancer)
  {
    return redirect()->back();
  }
}
