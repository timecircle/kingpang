@php
  $col = empty($col) ? 3 : $col;
@endphp
@foreach($products->chunk($col) as $chunk)
  <div class="row match-height mb-2">
      @foreach( $chunk as $product )
          <div class="col-md-{{ 12/$col }} col-sm-6" >
            <x-product.item :product="$product" />
          </div>
      @endforeach
  </div>

@endforeach
