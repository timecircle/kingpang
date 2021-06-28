@php
  $image  = empty($post->avatar) ? '' : url($post->avatar->src);
@endphp
<div class="box">
  <div class="card ">
    <div class="box-image lazy"
      data-bg-img ='{{ $image }}'></div>
      <div class="card-block">
        <a href="{{ url($post->link->pretty) }}">
          <div class="text-justify font-medium-2">
            {{ Str::title($post->name)  }}
          </div>
        </a>
    </div>
  </div>

</div>
