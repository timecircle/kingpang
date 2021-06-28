
@extends('page.inc.master')
@section('content')
<div class="container">
  <div class="content-header mb-2">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('home')}}</a>
      </li>

      </li>
      <li class="breadcrumb-item">
          {{__('Freelancer profile')}}
      </li>
    </ol>

    <h1 class="display-4">
      {{__('Freelancer profile')}}</h1>

  </div>

  <form class="form" action="{{  route('freelancers.store') }}"
    enctype="multipart/form-data"
    method="post">
    @csrf
    <input type="hidden" value="{{$user->id}}" name="user_id" />
    <div class="form-body">

      <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <div class="card-block">
                  <div class="row">
                      <div class="col-xs-4">

                          @include('com.avatarChange')

                      </div>
                      <div class="col-xs-8">

                        <div class="form-group">
                        <label> {{Str::title(__('transaction name')) }}</label>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <input type="text" placeholder="{{Str::title(__('transaction name')) }}"
                          value="{{old('name')}}"
                          class="form-control"
                          name="name" id="name" />

                        </div>

                        <div class="form-group">
                            <label> {{Str::title(__('job')) }}</label>
                            <textarea   class="form-control"

                            placeholder="{{Str::title(__('job')) }}">{{old('job')}}</textarea>
                          

                        </div>


                      </div>
                  </div>

                  <div class=" mt-1">

                      <textarea  name="intro" id="intro" rows="5" placeholder="{{Str::title(__('Intro')) }}"
                      class="form-control" >{{old('intro')}}</textarea>
                  </div>


                </div>
            </div>
        </div>
      </div>

      <div class="col-md-4">
          <div class="card">
              <div class="card-block ">
                <div class="form-group">
                  <label>{{Str::title(__('work email')) }}</label>
                  @error('work_email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <input type="email" value="{{old('work_email')}}"
                  class="form-control" placeholder="{{Str::title(__('Work email')) }}"
                  name="work_email" id="work_email" />
                </div>
                <div class="form-group">
                  <label>{{Str::title(__('work phone')) }}</label>
                  @error('work_phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <input type="number"  placeholder="{{Str::title(__('work phone')) }}"
                  class="form-control"  value="{{old('work_phone')}}"
                  name="work_phone" id="work_phone" />
                </div>

                <div class="form-group">


                  @include('com.inputArray',[
                      'labels'=>[
                          'Social Channel',
                          'Link'
                          ],
                    ])
                </div>
            </div>

          </div>


        </div>

    </div>
    <div class="form-actions clearfix">

      <div class="buttons-group float-xs-right">
        <button type="reset"
        class="btn ">
                      {{__('Cancel')}}
        </button>
           <button type="submit" class="btn btn-primary mr-1">{{__('Save')}}</button>
       </div>
    </div>



  </form>

@endsection
