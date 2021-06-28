@php
session(['menuOpenSub' => request('open','')]);
$user = Auth::user();
$role = Auth::user()->role;
@endphp
@section('body')
<x-block tag="nav" class="header-navbar container navbar-fixed-top navbar-light">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item p-1">
          <x-logo />
        </li>

      </ul>
    </div>

    <div class="pull-right nav-right px-6 py-4 sm:block">
      @if($role == 'admin')
      <ul class="nav navbar-nav">
        <li class="nav-item mr-1">
          <a class="nav-link" href="{{ route('users.index') }}">
            <i class="icon-logout"></i>
            <span class="menu-title"> {{ Theme::title('back to admin')  }}</span>
          </a>
        </li>


        <li class="nav-item ">
          <span class="avatar avatar-online">
            <img src="{{ asset('theme/images/portrait/small/avatar-s-1.png') }}" alt="avatar">
          </span>
          <span style="line-height: 2.2rem;">

            {{Theme::title('login as')}} :

            <span class="text-bold-600 "> {{ $freelancer->name }} </span> </span>
        </li>

      </ul>
      @else
      <x-menu.top :user="$user" />

      @endif


    </div>
  </div>
</x-block>
<x-block class="main-menu menu-fixed menu-light">
  <div class="main-menu-content menu-accordion">
    <x-menu.dev.freelancer :freelancer="$freelancer" />
  </div>
</x-block>


<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <x-block class="content-header row">
      @yield('title')
    </x-block>
    <x-block class="content-body">
      @yield('content')
    </x-block>
  </div>
</div>

@endsection
@push('x-script')
@if(session('menuOpenSub'))
$('.sub-{{session('menuOpenSub')}}').addClass('open');
@endif
@endpush

<x-layout.simple data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  container boxed-layout fixed-navbar" />