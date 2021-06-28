@props([
'col' => 3,
'query',
'total'=> 6
])
@php
$freelancers = $query->paginate($total);
@endphp

@foreach($freelancers->chunk($col) as $chunk)
  <div class="row match-height mb-2">
      @foreach( $chunk as $freelancers )
          <div class="col-md-{{ 12/$col }} col-xs-6" >
            <x-product.item :product="$product" />
          </div>
      @endforeach
  </div>
@endforeach
<div class="row float-xs-right">
  {{ $products->render('vendor.pagination.simple')  }}
</div>