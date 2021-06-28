@php
$avatar = $freelancer->avatar ? url($freelancer->avatar->src) : asset('theme/images/portrait/medium/avatar-m-5.png' ) ;
$short = url('s/'.$product->link->short);

@endphp

@section('content')
<x-block class="section mb-3">
  <div class="content-header">
    @if($product->avatar )
    <img class="img-fluid" src="{{asset($product->avatar->src)}}">
    @endif
  </div>
  <div class="p-1 line-bot">

    <div class="media profil-cover-details pull-left">
      <label class="profile-image mr-1">
        <img src="{{$avatar}}" class="rounded-circle img-border rect" alt="{{$freelancer->name}}">
      </label>
    </div>


    <div class="ml-1">
      <div class="font-medium-3">
        {{__($freelancer->name)}}
      </div>
      <div>
        {{__($freelancer->job)}}
      </div>
    </div>


  </div>
  <div class="p-1">
    <div class="font-medium-3 text-bold-600">
      {!! $product->name !!}
    </div>
    <div class="mt-1">
      {!! $product->description !!}
    </div>
  </div>

</x-block>


<x-block class="section mb-3">
  <ul id="tabs" class="nav nav-tabs nav-underline no-hover-bg">
    <li class="nav-item">
      <a class="nav-link active" id="tab-standard" data-toggle="tab" href="#standard" aria-expanded="true">
        <span class="font-medium-2">
          {{ Theme::title('standard')  }}

        </span>
      </a>
    </li>
    @foreach($packs as $pack)
    <li class="nav-item flex-1">
      <a class="nav-link" id="tab-{{$pack->pack}}" data-toggle="tab" href="#{{$pack->pack}}" aria-expanded="false">
        <span class="font-medium-2">
          {{ Theme::title($pack->pack)  }}
        </span>
      </a>
    </li>
    @endforeach
  </ul>
  <div class="content-body">
    <div class="tab-content card">
      <div class="tab-pane card-block active" id="standard" aria-expanded="true">

        <x-app.service.pack :service="$product" />

      </div>

      @foreach($product->getPacks()->get() as $pack)
      <div class="tab-pane card-block" id="{{$pack->pack}}">
        <x-app.service.pack :service="$pack" />
      </div>

      @endforeach

    </div>
  </div>
</x-block>

<x-block class="section mb-3">
  <div class="card-header">
    <h2 class="card-title">{{ Theme::title('recommended service') }}</h2>
  </div>

  <div class="p-2">
    <x-app.service.list :services="$recommendService" />

  </div>


</x-block>

<x-block id="sticky-wrapper" style="z-index: 9;" class=" fixed yt-0 app-w m-0  line-bot ">
    <div class="p-1">
      <div onclick="parent.md_hide('#modal-src')" class="pull-left  font-medium-4 fonticon-wrap">
        <i class="ft-arrow-left  primary"></i>
      </div>
      <div class="pull-right ">


        <livewire:auth.like class="primary font-medium-4" :item="$product" count="{{ $product->likes->count() }}" />

        <span onclick="share('{{$short}}')" class="primary font-medium-4">
          <i class="ft-share"></i>
        </span>
      </div>
    </div>
</x-block>



@endsection

@push('script')
<script>
  $(window).scroll(function() {
    var header = document.getElementById("sticky-wrapper");
    if (window.pageYOffset > 50) {
      header.classList.add("card");
    } else {
      header.classList.remove("card");
    }
  });
</script>

@endpush

<x-layout.mobile />