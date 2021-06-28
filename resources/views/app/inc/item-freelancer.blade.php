<div class="card shadow box-round" onclick="if_src('{{  route('app.freelancer',[$token,$item]) }}')">

  <div style="height:8rem;overflow:hidden">
    @if($item->avatar)
      <img class="img-fluid img-top" loading="lazy" src="{{ url($item->avatar->src) }}">
    @endif

  </div>

  <div class="card-body m-1">
    <p class="font-medium-2 primary text-bold-600">{{$item->name}}</p>
    <p>{{$item->job}}</p>
  </div>
</div>
