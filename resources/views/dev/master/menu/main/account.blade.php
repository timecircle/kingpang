<ul class="menu-content">
  <li class="nav-item">
    <a href="{{ route('users.index',['open'=>'account'])  }}">
      <span class="menu-title">{{ Theme::title('admin') }}</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('users.index',['open'=>'account'])  }}">
      <span class="menu-title">{{ Theme::title('freelancer') }}</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('users.index',['open'=>'account'])  }}">
      <span class="menu-title">{{ Theme::title('customer') }}</span></a>
  </li>
</ul>
