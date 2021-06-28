@php
$rows = ['description','delivery','revision'];
$push = 'page.product.detail.push';
$tabs = [
'description',
'portfolio',
'price',
'recommendations',
'review'];
@endphp
@include($push,['active' => 'active'])
@foreach( $packs as $product)
@include($push)
@endforeach

@push('script')
<script>
  $(window).scroll(function() {
    var stick = $('#stick_tab');
    if (window.pageYOffset > 240) {
      $('#stick_tab').removeClass("none");
    } else {
      $('#stick_tab').addClass("none");
    }
  });
</script>
@endpush

@push('outer')
<x-modal.contact :freelancer="$freelancer" />
@endpush
@push('sticky')
<div id="stick_tab" class="container-fluid none line-b">

  <div class="container">
    <ul id="overview" class="nav nav-tabs nav-underline no-hover-bg">
      <li class="nav-item">
        <a class="nav-link active" id="tab-overview" href="#overview">
          {{ Theme::title('overview') }}
        </a>
      </li>
      @foreach($tabs as $tab)
      <li class="nav-item">
        <a class="nav-link" id="{{$tab}}-tab" href="#{{ $tab }}">
          {{ Theme::title($tab) }}
        </a>
      </li>
      @push('tab-content')
      <div class="card">
        <h4 class="card-title">
          {{ Theme::title($tab) }}
        </h4>
        <div class="card-block box">
          @include("page.product.detail.tab-$tab")
        </div>
      </div>
      @endpush
      @endforeach
    </ul>
  </div>
</div>
@endpush

@section('title')
<x-product.breadcrumb :product="$product" />
@endsection

@section('content')
<h2 class="card-title text-justify text-bold-400">
  {{ $product->name }}
</h2>
<div class="card">

  @if($product->avatar)
  <img loading="lazy" class="img-fluid" src="{{ url($product->avatar->src) }}" />
  @endif

</div>

@stack('tab-content')
@endsection
@section('side')
<div class="card ">
  <div class="card-body">
    <ul class="nav nav-tabs  nav-top-border no-hover-bg">
      @stack("pack-header")
    </ul>
    <div class="tab-content px-1 pt-1 ">
      @stack("pack-body")
    </div>

    <div class="row text-xs-center pt-1 pb-1">
      <a href='#price' class="text-success  text-bold-600 font-medium-2">
        {{ Theme::title('compare packages') }} </a>
    </div>
  </div>
  <div class="card-footer text-xs-center">
    <x-button.contact id="{{$freelancer->id}}" class="btn btn-block btn-secondary" out="{{ Theme::title('contact consultant') }}" />
  </div>
</div>

@endsection
<x-layout.master side="right" />