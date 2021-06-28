@props([
'list'
])

@foreach($list as $code)

@php
  $category = App\Models\Category::pull($code,'service')->first();
  if(isset($category)){
    $query = App\Models\Product::inventory()->category($category->id)->so();
  }
@endphp

@if(isset($query))
<div class="container">
  <div class="content-header">
    <h2 class="text-bold-600">
      {{ Theme::title($category->name) }}
    </h2>
  </div>
  <div class="content-body pt-2">
    <x-product.list col="4" :query="$query" total="4" :pagination="false"/>
  </div>

</div>
@endif

@endforeach