<div class="card shadow box-round" >
  <div style="height:8rem;overflow:hidden">
    @if($item->avatar)
      <img class="img-fluid img-top" loading="lazy" src="{{ url($item->avatar->src) }}">
    @endif

  </div>

<div class="card-body m-1">
  <div class="clear">
    <label class="pull-left">
        <span class="primary">
      
        <x-star />
        <span class="text-muted"></span>
      </label>
      <div class="pull-right fonticon-wrap">
            <span> <i class="ft-heart"></i> </span>
      </div>
  </div>
  <div class="clear pb-2"  onclick="if_src('{{route('app.product',[$token,$item]) }}')">
      <p class="text-bold-400">{{$item->name}}</p>

      <p class="font-medium-2 primary prb">
        {{ Theme::title('form') }} :
        <span class=" text-bold-600">
        {{$item->price_format}}
      </span>
      </p>
  </div>
</div>
</div>
