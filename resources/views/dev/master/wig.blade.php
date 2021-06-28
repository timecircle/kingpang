<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('dev.master.inc.head')
    <body class="antialiased" >
      <div class="container-fluid mb-1">
        <div class="col-md-10">
          <h4 class="card-title ml-1 mt-1">
            @if(isset($title))
              {{ Str::title(__($title)) }}
            @endif
          </h4>
        </div>

        <div class="col-md-2">
          <button type="button"

          class="btn btn-info mt-1 pull-right"  onclick="{{ Theme::loadOr( $md )  }} ">
                        <span aria-hidden="true"> X </span>
                      </button>
          </div>
      </div>
      <div class="container">
        @yield('content')
      </div>

      @include('dev.master.inc.outer')
      <script>
          $('#if-content', window.parent.document).fadeIn(500);
      </script>
    </body>
</html>
