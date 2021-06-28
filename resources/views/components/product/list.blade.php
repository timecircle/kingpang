@props([
'col' => 3,
'query',
'total'=> 6,
'pagination' => true
])
@php
$products = $pagination ? $query->paginate($total) : $query->get();
@endphp

@foreach($products->chunk($col) as $chunk)
  <div class="row match-height mb-2">
      @foreach( $chunk as $product )
          <div class="col-md-{{ 12/$col }}" >
            <x-product.item :product="$product" />
          </div>
      @endforeach
  </div>
@endforeach
@if($pagination)
<div class="row float-xs-right">
  {{ $products->render('vendor.pagination.simple')  }}
</div>
@endif