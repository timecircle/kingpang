@php
  $role = Auth::user()->role;
@endphp
<ul id="main-menu-navigation" data-menu="menu-navigation"
class="navigation navigation-main">

<li class="nav-item">
      <a href="{{ route('dev.index')  }}">
        <i class="icon-graph"></i>
        <span class="menu-title">{{ Theme::title('dashboard')  }}</span></a>
</li>

@if(!in_array($role, ['editor','shop']))
  <li class="nav-item">
        <a href="{{ route('freelancers.index')  }}">

          <i class="icon-briefcase"></i>
          <span class="menu-title">{{ Theme::title('freelancer') }}</span></a>
  </li>
  <li class="nav-item has-sub {{ request('open') =='config' ? 'open' : '' }}">
    <a href="#">
      <i class="icon-settings"></i><span class="menu-title"> {{Theme::title('config')}}</span>
    </a>
    @include('dev.master.menu.main.config')
  </li>

@endif


<li class="nav-item has-sub {{ request('open') =='post' ? 'open' : '' }}">
  <a href="#">
    <i class="icon-docs"></i><span class="menu-title">{{ Theme::title('post')  }} </span>
  </a>
    @include('dev.master.menu.main.post')

</li>
@if($role ==  'admin')
  <li class="nav-item has-sub">
      <a href="#">
        <i class="icon-users"></i><span class="menu-title"> {{Theme::title('account')}}</span>
      </a>
      @include('dev.master.menu.main.account')
  </li>
@endif
<li class="nav-item ">
    <a href="{{ route('logout') }}">
    <i class="icon-power"></i>
    <span class="menu-title">  {{  Theme::title('logout')  }}</span>
    </a>
</li>
</ul>
