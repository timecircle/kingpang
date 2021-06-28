@props(['freelancer'])
@php
   
    $avatar     = empty($freelancer->avatar) ? null : url($freelancer->avatar->src);
@endphp
<div class="box">
  <div class="card">
    <a href="{{ url($freelancer->link->pretty) }}">
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
       
      </div>

  </div>

  
</div>
