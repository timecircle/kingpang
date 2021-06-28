<div class="row p-1 line-top"
data-toggle="modal" data-target="#type-{{$item->id}}">

    <div class="col-xs-2">
      @if($item->avatar)
        <img loading="lazy" class="icon"
        src="{{ url($item->avatar->src)  }}" />
      @endif

    </div>
    <div class="col-xs-10">
      <h6>{{ $item->name }}</h6>
      <p>{{ $item->description }}</p>
    </div>

</div>
@push('outer')
<div class="modal fade" id="type-{{$item->id}}"
  tabindex="-1" role="dialog">
  <div class="app-content bg-white">

    @include('app.search.viewType')
  </div>
</div>

@endpush
