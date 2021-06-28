<x-block class="section mb-3 pt-8 ">
  @foreach( $market as $item)

  <div class="line-bot mb-1" data-toggle="modal" data-target="#type-{{$item->id}}">
    <div class="pull-left mr-2">
      @if($item->avatar)
      <img loading="lazy" class="app-ico" src="{{ url($item->avatar->src)  }}" />
      @endif
    </div>
    <div class="p-1">
      <h6>{{ $item->name }}</h6>
      <p>{{ $item->description }}</p>
    </div>

  </div>
  @endforeach

</x-block>
<x-block class="app-w line-bot card fixed  yt-0 text-xs-center">
  <div class="p-1">
    <x-app.open class="form-group position-relative has-icon-left" route="{{route('app.search')}}">

      <label class="form-control round">
        {{ Theme::title('what are you looking for?') }}
      </label>
      <div class="form-control-position">
        <i class="ft-search  primary font-medium-4"></i>
      </div>
    </x-app.open>
  </div>
</x-block>