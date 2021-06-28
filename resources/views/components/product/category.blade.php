@props([
'code',
'col' =>4,
'pagination' => false,
'limit' => null,
'total' => 12,
])
@php
$category = App\Models\Category::pull($code,'service')->first();
@endphp

@if(isset($category))
@php
$query = App\Models\Product::root()->inventory()->category($category)->so();
if($limit)$query->take($limit);
@endphp

<div class="container">
  <div class="content-header">
    <h2 class="text-bold-600">
      {{ Theme::title($category->name) }}
    </h2>
  </div>
  <div class="content-body pt-2">
    <x-product.list col="{{$col}}" total="{{$total}}" :query="$query" pagination="{{$pagination}}" />
  </div>

</div>

@endif