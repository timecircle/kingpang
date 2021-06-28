@push('table-pack-header')
  <th>
    <h2 class="primary">{{ $product->price_format }}</h2>
    <h4 class="card-title">{{ Theme::title($product->pack) }}</h4>

  </th>
@endpush

@foreach($rows as $row)
    @push('table-pack-row-'.$row)
      <td style="max-width:8rem">{{ $product->$row }}</td>
    @endpush
@endforeach

@push('table-pack-footer')
    <td>
      <x-button.cart class="btn btn-primary btn-block"
        id="{{$product->id}}"
        out="{{ Theme::title('select') }}" />
    </td>
@endpush


@push("pack-header")
  <li class="nav-item ">
    <a class="nav-link {{ $active ?? '' }}"
    id="tab-{{$product->pack}}" data-toggle="tab"
    href="#{{$product->pack}}" aria-expanded="false">
      <span class="font-medium-2">
       {{ Theme::title($product->pack) }}
     </span>

    </a>
  </li>
@endpush

@push("pack-body")
<div role="tab-{{$product->pack}}" class="tab-pane {{ $active ?? '' }}" id="{{$product->pack}}" aria-expanded="true" >
  <div class="card-title text-xs-center font-large-1 text-bold-700">

        {{ $product->price_format }}

  </div>
  <div  class="card-content mb-2">
   {!! $product->description !!}
  </div>

  <div class="row font-medium-1">
    <label class="col-md-6">
     <i class='icon-calendar mr-1'></i>
     {{ Theme::title('delivery') }}
   </label>
    {{ $product->delivery_format }}

  </div>
  <div class="row font-medium-1 mb-2">

      <label class="col-md-6">
        <i class='icon-wrench mr-1'></i>
       {{ Theme::title('revisions') }}
     </label>

    {{ $product->revisions_format }}
  </div>
  <x-button.cart id="{{$product->id}}"
    class="btn btn-primary btn-block"
    out="{{ Theme::title('continue') }}" />
</div>
@endpush

@push('outer')
 <x-modal.cart :product="$product"  />

@endpush
