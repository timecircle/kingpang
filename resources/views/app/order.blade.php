@section('content')
@php
$list = $query->paginate(6);

@endphp

<x-block class="section pt-4">

  @if($query->count())


  <div class="p-2">

    @foreach ($list as $row)
    @if(isset($row->item))
    @php

    $service = $row->item->product;

    @endphp

    <div class="row">
      <div class="col-xs-4">

        @if($service->avatar)
     
          <img class="img-fluid img-top" loading="lazy" src="{{ asset($service->avatar->src) }}">
     
        @endif
      </div>
      <div class="col-xs-8">
        <div class="text-bold-600"> {{$service->name}} </div>
        <p> {{$service->intro}} </p>

        <p><span class="tag tag tag-pill tag-info ">{{ __($row->state) }}</span></p>
        <p>{{Theme::title('at') }}: {{$row->created_at}}</pv>
      </div>
    </div>
    <tr>


      @endif
      @endforeach
  </div>
  @else

  <div class="p-1 text-xs-center">
    <img class="img-fluid" src="{{asset('theme\images\empty.png')}}" loading="lazy" />
  </div>

  @endif
  <div class="p-1 text-xs-center">

    <x-app.open class="btn btn-sm btn-primary" route="{{route('app.search')}}"> {{Theme::title('start shopping')}} </x-app.open>
  </div>
</x-block>


<x-block style="z-index: 9;" class="app-w card p-1 line-bot fixed yt-0 text-xs-center">
  <h4 class="text-bold-600 text-xs-center">

    <label class=" pull-left" onclick="parent.md_hide('#modal-src')">
      <i class="ft-arrow-left  pull-left  primary font-medium-4"></i>
    </label>
    {{ Theme::title('orders') }}
  </h4>
</x-block>
@endsection

<x-layout.mobile />