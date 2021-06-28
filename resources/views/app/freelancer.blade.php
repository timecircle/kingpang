@php
$avatar = $freelancer->avatar ? url($freelancer->avatar->src) : asset('theme/images/portrait/medium/avatar-m-5.png' ) ;
$short = url('s/'.$freelancer->link->short);
@endphp

@section('content')

<x-block class="header-round bg-primary ">
  <div class="media profil-cover-details text-xs-center">
    <label class="profile-image">
      <img src="{{$avatar}}" class="avatar-rect img-border" alt="{{$freelancer->name}}">
    </label>

    <h4 class="card-title">
      {{Theme::title($freelancer->name)}}
    </h4>

  </div>
  <div class="col-xs-12 text-xs-center">
    <div class="card black box-round">
      <div class="p-1">
        <div class="font-medium-2">
          {{Theme::title($freelancer->job)}}
        </div>
        <label class="text-bold-600 font-medium-1">
          <x-star />
        </label>

      </div>
    </div>

  </div>
</x-block>

<x-block style="overflow: auto;" class="w-100 mb-3" >
  <div class="offset-xs-1 text-xs-center col-xs-10">
  @if($freelancer->intro)
  <h2 class="primary ">
    {{Theme::title('intro')}}
  </h2>
  <div class="card-body">
    {{ $freelancer->intro }}
  </div>
  @endif
</div>
</x-block>

<x-block class="w-100 section mb-3">
  <div class="card-header">
    <h2 class="card-title">{{ Theme::title('services') }}</h2>
  </div>

  <div class="p-2">
    <x-app.service.list :services="$recommendService" />

  </div>
</x-block>
<x-block class="app-w  p-1 fixed line-top bg-white m-0 yb-0">

<x-app.sendmess :freelancer="$freelancer" />
</x-block>


<x-block id="sticky-wrapper" class="fixed yt-0 app-w m-0  ">
  <div class="p-1">
    <div onclick="parent.md_hide('#modal-src')" class="pull-left  font-medium-4 fonticon-wrap">
      <i class="ft-arrow-left"></i>
    </div>
    <div class="pull-right ">


      <livewire:auth.like class="font-medium-4" :item="$freelancer" />

      <span onclick="share('{{$short}}')" class="font-medium-4">
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
      header.classList.add("card","primary");
    } else {
      header.classList.remove("card","primary");
    }
  });
</script>

@endpush

<x-layout.mobile />