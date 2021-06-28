@php
$facebook = "#bot:login?by=facebook";
$google = "#bot:login?by=google";
$apple = "#bot:login?by=apple";

@endphp
<div class="app-w">
  <div class="card-block">
    <div class="form-group row one">
      <a href="{{$facebook}}" class="btn btn-facebook block">
        <i class="fa fa-facebook"></i> <span class="ml-1">
          {{ __('Continue with Facebook') }} </span>

      </a>
    </div>

    <div class="form-group row one">
      <a href="{{$google}}" class="btn bg-google white  block">
        <i class="fa fa-google-plus"></i><span class="ml-1">
          {{ __('Continue with Google') }}
        </span>
      </a>
    </div>

    <div class="form-group row one">
      <a href="{{$apple}}" class="btn bg-apple white block">
        <i class="fa fa-apple"></i><span class="ml-1">
          {{ __('Continue with Apple') }}
        </span>
      </a>
    </div>
  </div>
</div>