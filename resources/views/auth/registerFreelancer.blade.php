@extends('auth.modal')


@section('content')
<div class="content-wrapper">

<div class="card">
  <div class="card-header" id="heading-links">
					<h4 class="pull-left">{{ __('Register') }}</h4>

        	<div class="heading-elements pull-right">

            <button type="button" class="close" onclick="{{ Theme::loadOr( '#modal-if' )  }} ">
              <span aria-hidden="true">×</span>
            </button>
					</div>
	</div>
  <div class="card-block">
    <div class="card-body">
        <form id="frmLogin" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="col-md-6">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label>{{Str::title(__('label.transaction name')) }}</label>
              <input type="text"
              class="form-control" value="{{ old('name') }}"
              name="name" id="name" />
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="row mt-1">

              <div class="col-xs-6">
                <label>{{Str::title(__('work email')) }}</label>
                <input type="email" value="{{ old('email') }}"
                class="form-control"
                name="work_email" id="work_email" />
              </div>
              <div class="col-xs-6">
                <label>{{Str::title(__('work phone')) }}</label>
                <input type="number"  placeholder="input phone"
                class="form-control"
                name="work_phone" id="work_phone" />
              </div>
            </div>

            <div class="form-group mt-1">
              <label>{{Str::title(__('label.intro')) }}</label>
                <textarea  name="intro" id="intro"
                class="form-control" >{{ old('intro') }}</textarea>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
