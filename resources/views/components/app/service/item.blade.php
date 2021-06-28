@props([
'service',
'route'
])
<div class="card shadow box-round">

  @if($service->avatar)
  <x-app.open style="height:8rem;overflow:hidden" route="{{$route}}">
    <img class="img-fluid img-top" loading="lazy" src="{{ url($service->avatar->src) }}">
  </x-app.open>
  @endif

  <div class="card-body m-1">
    <div class="clear">
      <label class="pull-left">
        <span class="primary">

          <x-star />
          <span class="text-muted"></span>
      </label>
      <div class="pull-right fonticon-wrap">
          <livewire:auth.like :item="$service" count="{{$service->likes->count()}}" />
      </div>
    </div>
    <x-app.open route="{{$route}}" class="clear pb-2">
      <p class="text-bold-400">{{$service->name}}</p>
      <p class="font-medium-2 primary prb">
        {{ Theme::title('form') }} :
        <span class=" text-bold-600">
          {{$service->price_format}}
        </span>
      </p>
    </x-app.open>

  </div>
</div>