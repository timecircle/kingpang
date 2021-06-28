@section('content')


<x-block class="section pt-4">
  
@if($list)
<div class="card-header">
    <h2 class="card-title">{{ Theme::title('list saved') }}</h2>
  </div>

  <div class="p-2">
    <x-app.service.list :services="$list"  />

  </div>
@else 

<div class="p-1 text-xs-center">
  <img class="img-fluid" src="{{asset('theme\images\empty.png')}}" loading="lazy" />
</div>

@endif
<div class="p-1 text-xs-center">

<p>{{__('Something you like ? Save it')}}</p>
<x-app.open class="btn btn-sm btn-primary" route="{{route('app.search')}}" > {{Theme::title('start shopping')}} </x-app.open>
</div>
</x-block>


<x-block style="z-index: 9;" class="app-w card p-1 line-bot fixed yt-0 text-xs-center">
    <h4 class="text-bold-600 text-xs-center">
  
        <label class=" pull-left" onclick="parent.md_hide('#modal-src')">
            <i class="ft-arrow-left  pull-left  primary font-medium-4"></i>
        </label>
        {{ Theme::title('favorites') }}
    </h4>
</x-block>
@endsection

<x-layout.mobile />