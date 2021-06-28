@php
  $header = isset($productCategory) ? $productCategory : $productType;
@endphp
@section('content')
<div class="container">
  <x-block class="content-header ">
    <h1 class="display-4">
      {{ $header->name }}</h1>
      <p class="font-medium-2">{{$header->description}} </p>
  </x-block>
  <div class="content-body row">
    <div class="col-md-3">
        <x-menu.category type="{{$productType->id}}" />
    </div>
    <div class="col-md-9">
      <x-product.filter />
      <x-product.list :products="$products" />
      <x-block class="row float-xs-right" >
        {{ $products->render() }}
      </x-block>
    </div>
  </div>
</div>
@endsection
<x-layout.master />
