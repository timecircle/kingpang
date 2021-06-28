@push('css')
<link href="{{asset('theme/css/home.css')}}" rel="stylesheet">
@endpush
@push('script')
<script>
  $('#home-slide').carousel({
    interval: 2000,
  });
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
<x-block id="sticky-wrapper" class="bg-white sticky-wrapper line-b none">
  <x-layout.inc.header />
</x-block>
<x-block class="container-fluid bg-home">
  <div class="container p-1">
    <div class="navbar-header">
      <x-logo style="top" />
      <div class="float-xs-right">
        <x-menu.top />
      </div>
    </div>
  </div>
  <!-- /horizontal menu content-->
  <div id="block-slide" class="container">
    <x-home.slide />
  </div>
</x-block>

<x-block class="container-fluid bound">
    <x-home.marketplace />
</x-block>

<x-block class="container-fluid bound tip">
    <x-home.ads />
</x-block>

<x-block class="container-fluid bound">
    <x-home.popular />
</x-block>

<x-block class="container-fluid bound tip">
    <x-home.review />
</x-block>

<x-block class="container-fluid bound">
    <x-home.recommend />
</x-block>
@endsection
@section('footer')
<x-layout.inc.footer />
@endsection
@push('outer')
<x-layout.inc.outer />
@endpush
<x-layout.simple class="bg-white"/>