

<div class="section mb-3 pt-4">
  <div class="text-xs-center p-1 ">
    @if($item->avatar)
    <img src="{{ asset($item->avatar->src)  }}" loading="lazy" class="card-img-top img-fluid">
    @endif
  </div>

  @foreach( $item->childs()->get() as $category)
  
  <x-app.open class="p-1 tab-row line-bot" route="{{ route('app.category',$category) }}">

    <h6>{{ $category->name }}</h6>
    <p>{{ $category->description }}</p>

  </x-app.open>
  
  @endforeach

</div>

<div class="app-w card p-1 line-bot fixed yt-0 text-xs-center">
  <div class="flex">
    <div class="flex-1 " data-dismiss="modal">
      <i class="ft-arrow-left  pull-left  primary font-medium-4"></i>
    </div>
    <div class="flex-1">
      <h4 class="text-bold-600 text-xs-center">
        {{ $item->name }}
      </h4>

    </div>
   
    <x-app.open class="flex-1" route="{{route('app.search')}}">
      <i class="ft-search pull-right  primary font-medium-4"></i>
    </x-app.open>
  
  </div>
</div>