@extends('page.ext.simple')
@push('script')
  <script>
      $(window).scroll(function() {
          var header = document.getElementById("sticky-wrapper");
          var sticky = header.offsetTop;
          if (window.pageYOffset > sticky) {
            header.classList.remove("none");
          } else {
            header.classList.add("none");
          }
      });
  </script>
@endpush
@section('body')
  <div id="sticky-wrapper" class="bg-white sticky-wrapper line-b none">
      @include('page.inc.header.post')
      @stack('sticky')
  </div>
  @include('page.inc.header.post')

  <div class="content-wrapper">
    @yield('content')
  </div>
@endsection
