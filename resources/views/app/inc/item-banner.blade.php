<div class="card box" onclick="if_src('{{route('app.product',[$token,$item]) }}')">
  <div style="height:4rem;overflow:hidden">
    @if($item->avatar)
      <img class="img-fluid img-top" loading="lazy" src="{{ url($item->avatar->src) }}">
    @endif
  </div>
  <div class="card-body m-1">
    <p class="text-bold-600">{{$item->category->name}}</p>
  </div>
</div>
