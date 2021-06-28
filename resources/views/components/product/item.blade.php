@props(['product'])
@php
    $freelancer = $product->freelancer;
    $avatar     = empty($freelancer->avatar) ? null : url($freelancer->avatar->src);
    $image      = empty($product->avatar) ? null :  url($product->avatar->src);
    $name       = $product->name;
    $price      = number_format($product->price).'đ';
    $star       = 5;
    $rate       = 76;
  
@endphp
<div class="box">
  <div class="card">
    <a href="{{ url($product->link->pretty) }}">
      <div class="box-image lazy" data-bg-img ='{{ $image }}'></div>
    </a>
      <div class="card-header">
        <div class="row mb-2">
          <div class="float-xs-left">
            <a href="{{ url($freelancer->link->pretty)  }}">
                @isset($avatar)
                <img loading="lazy" src="{{ $avatar }}" class="rounded-circle img-border x32"  />
                @endisset
                {{ Theme::title($freelancer->name)  }}
              </a>
          </div>
          <div class="float-xs-right">
              <span class="yellow darken-1">  <i class="fa fa-star"></i> {{$star}} </span>
              <span class="blue-grey font-small-3">({{ $rate }})</span>
          </div>
        </div>
        <div class="row text-justify">
          <a href="{{ url($product->link->pretty) }}">
            {{ Str::title($product->name) }}
          </a>
        </div>
      </div>

  </div>

  <div class="card-footer">
    <div class="row">
      <div class="float-xs-left font-medium-2">
        <livewire:auth.like :item="$product" count="{{$product->likes->count()}}" />
      </div>
      <div class="float-xs-right ">
        {{Theme::title('start at')}}
        <span class="font-medium-2 primary text-bold-600"> {{ Theme::title( $price)  }} </span>
      </div>
    </div>
  </div>
</div>
