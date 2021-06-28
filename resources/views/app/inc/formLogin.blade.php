
@php
  $srcLogo  = url('vendor/me/images/logo/logo-h.png');

@endphp


  <div class="card h-100">
    <form class="form" action="{{ route('app.sign',$token ) }}" method="post">
        @csrf

    <div class="card-header text-xs-center">
      <img class="brand-lg" loading="lazy" src="{{ $srcLogo }}">
    </div>
    <div class="card-body">
      <div class="card-block">

            <fieldset class="form-group">
                <input name="email"
                type="email" required class="form-control" >
            </fieldset>
            <fieldset class="form-group">
                <input name="password"
                type="password" required class="form-control" >
                <p class="text-xs-right font-weight-sm"><a href="#" class="card-link">{{Str::title(__('forgot password'))}}</a>
                </p>
            </fieldset>


            <p class="card-title text-xs-center font-small-3 mx-2">
                      <span class="text-muted font-small-3 mx-2"> {{ __('or') }}</span>
                </p>


            <div class="text-xs-center pb-3">
              <a href="#bot:login?by=facebook" class="btn mb-1">
                <img class="img-fluid"
                src="{{ url('vendor/me/images/icons/facebook.png')  }}"></a>
              <a href="#bot:login?by=google" class="btn mb-1">
                <img class="img-fluid"
                src="{{ url('vendor/me/images/icons/google.png')  }}"></a>
              <a href="#bot:login?by=apple" class="btn mb-1">
                <img class="img-fluid"
                src="{{ url('vendor/me/images/icons/apple.png')  }}"></a>
            </div>


      </div>
    </div>

    <div class="app-width fixed yb-0">
      <div class="card-block text-xs-center">
        <button type="submit" class="btn btn-primary btn-block round "> {{Theme::title(__('login'))}}</button>
      </div>
    </div>
    </form>
  </div>
