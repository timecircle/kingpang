@push('css')
  <style>
  html body {
    background: none;
  }
  </style>
@endpush
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('page.inc.tag_header')
    <body class="antialiased" >

      <div class="container">
          @yield('content')

      </div>

      @include('dev.master.inc.outer')
      <script>
          $('#if-content', window.parent.document).fadeIn();
      </script>
    </body>
</html>
