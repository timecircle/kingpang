@props([
'market'
])

@foreach( $market->chunk(4) as $chunk)
<div class="mb-2">
  @foreach($chunk as $item)
  <div class="col-xs-3 ">
    <div data-toggle="modal" data-target="#type-{{$item->id}}" class="touch  text-xs-center">
      @if($item->avatar)
      <img loading="lazy" class="app-ico" src="{{ url($item->avatar->src)  }}" />
      @endif
      <p class="text-bold-600">{{ $item->name }}</p>
    </div>
  </div>
  @endforeach
</div>
@endforeach