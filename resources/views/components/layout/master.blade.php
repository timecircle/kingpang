@props([
'side' => 'none'
])

@push('css')
<style>
  .ph {
    padding-top: 12rem;
  }
  .content-body{
    min-height: 420px;
  }
</style>
@endpush
@push('script')
<script>
  $(window).scroll(function() {
    var footer = $('#footer').offset().top;
    if (window.pageYOffset > (footer - 600)) {
      sidebar.classList.remove("fixed");
      sidebar.classList.add("none");
    } else {
      sidebar.classList.add("fixed");
      sidebar.classList.remove("none");
    }
  });
</script>
@endpush
@section('body')
<x-block id="sticky-wrapper" class="bg-white sticky-wrapper line-b">
  <x-layout.inc.header />
  @stack('sticky')
</x-block>

<div class="content-wrapper ph">
  <div class="container">
    <x-block class="content-header mb-2">
      @yield('title')
    </x-block>
    @switch($side)
    @case( 'left')
    <div class="content-body mb-3 row">
      <x-block style="z-index:99" class="offset-md-3 col-md-9">
        @yield('content')
      </x-block>

      <x-block id="sidebar" class="container row fixed">
        <div class="col-md-3 sid">
          @yield('side')
        </div>
      </x-block>

    </div>
    @break
    @case( 'right')
    <div class="content-body row">
      <x-block id="sidebar" class="container row fixed">
        <div class="offset-md-7 col-md-5 sid">
          @yield('side')
        </div>
      </x-block>
      <x-block style="z-index:99" class="col-md-7">
        @yield('content')
      </x-block>

    </div>
    @break
    @case( 'both')
    <div class="content-body row">
      <x-block id="sidebar" class="container row fixed">
        <div class="col-md-3 sid s-left">
          @yield('side-left')
        </div>

        <div> class="col-md-3 offset-md-6 sid s-right">
          @yield('side-right')
        </div>
      </x-block>
      <x-block style="z-index:99" class="offset-md-3 col-md-6">
        @yield('content')
      </x-block>
    </div>
    @break
    @default
    <x-block class="content-body">
      @yield('content')
    </x-block>
    @endswitch
  </div>
</div>
@endsection
@section('footer')
<x-layout.inc.footer />
@endsection

@push('outer')
<x-layout.inc.outer />

@endpush
<x-layout.simple class="bg-white" />