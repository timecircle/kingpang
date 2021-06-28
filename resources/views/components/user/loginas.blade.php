@props([
'user' => new App\Models\User,
])
@php

$roles = ['editor','shop','manager','admin'];
$action = ($user->id) ? route('users.update',$user) : route('users.store');
$method = ($user->id) ? 'PUT' : 'POST';
$title = ($user->id) ? 'Edit Account' : 'Create Account';
@endphp
<x-form class="form" action="{{  $action }}" method="{{$method}}">
  <div class="container">

    
    <div class="col-md-8">
      <div class="form-group">
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="text" value="{{$user->name}}" placeholder="{{Theme::title('name')}}" class="form-control input-lg" name="name" />

      </div>
      <div class="card">

        <div class="card-body">

          <div class="card-block">
            <div class="row">

              <div class="col-xs-6">

                <div class="form-group">
                  <label>{{ Theme::title('password') }}</label>
                  <input type="password" class="form-control" name="password" id="password" />
                </div>


              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label>{{ Theme::title('password confirmation') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card box">
        <div class="card-header">
          <h4 class="card-title">{{ Theme::title('avatar') }}</h4>

          <div class="heading-elements">
            <a data-action="collapse"><i class="ft-minus"></i></a>
          </div>
        </div>

        <div class="card-body collapse in text-xs-center">
          <x-temp class="img-fluid" src="{{empty($user->avatar) ? '': asset($user->avatar->src)}}" style="height:120px" />
        </div>
      </div>

      <div>

      </div>
      <div class="box card">


        <div class="card-footer">
          <div class="row">
            <div class="col-xs-6">
              <button type="reset" class="btn btn-block ">
                {{Theme::title('cancel')}}
              </button>
            </div>
            <div class="col-xs-6">
              <button id="btn_send" type="submit" class="btn btn-primary btn-block">
                {{Theme::title('save')}}
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</x-form>