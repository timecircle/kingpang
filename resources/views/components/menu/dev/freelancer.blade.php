@props(['freelancer'])

@php

$avatar = $freelancer->avatar ? asset($freelancer->avatar->src) : asset('images/portrait/small/avatar-s-4.png');
@endphp
<div class="p-2 profile-card-with-cover text-xs-center">
  <div class="card-profile-image mb-2">
    <img src="{{ $avatar }}" loading='lazy' class="width-100 height-100 rounded-circle img-border box-shadow-1" alt="Freelancer">
  </div>
  <a class=" btn btn-primary btn-sm btn-block " href="{{route('auth.favorites',$freelancer->user)}}">
      <i class="fa fa-exchange"></i>
      <span class="text-bold-600 "> {{ Theme::title('my KingPang') }} </span> </span>
    </a>
</div>

<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
  <li class="nav-item">


  </li>
  <li class="nav-item ">
    <a href="#">
      <i class="icon-home"></i> <span class="menu-title">{{ Theme::title('dashboard')  }}</span>
    </a>
  </li>
  <li class="nav-item ">
    <a href="{{ route('freelancers.products.index',$freelancer)}}">
      <i class="icon-social-dropbox"></i> <span class="menu-title">{{ Theme::title('my services')  }}</span>
    </a>
  </li>
  <li class="nav-item has-sub">
    <a href="{{ route('dev.index')  }}">
      <i class="icon-bar-chart"></i>
      <span class="menu-title">{{ Theme::title('sales')  }}</span>
    </a>
    <ul class="menu-content">
      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'order']) }}">
          <span class="menu-title">{{ Theme::title('unpaid')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'paid']) }}">
          <span class="menu-title">{{ Theme::title('paid')  }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'proccess']) }}">
          <span class="menu-title">{{ Theme::title('in process')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'edit']) }}">
          <span class="menu-title">{{ Theme::title('editing')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'finish']) }}">
          <span class="menu-title">{{ Theme::title('finish')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'pending']) }}">
          <span class="menu-title">{{ Theme::title('pending')  }}</span>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',[$freelancer,'state'=>'cancel']) }}">
          <span class="menu-title">{{ Theme::title('cancel')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('freelancers.orders.index',$freelancer) }}">
          <span class="menu-title">{{ Theme::title('all')  }}</span>
        </a>
      </li>

    </ul>

  </li>

</ul>