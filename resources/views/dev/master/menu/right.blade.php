
<ul class="nav navbar-nav float-xs-right">
    <li class="nav-item mr-2">
      <a  href="#"
      class="nav-link">
        <i class="flag-icon flag-icon-vn"></i></a>

    </li>
    <li class="nav-item mr-2">
        <a href="#" class="nav-link">
          <i class="flag-icon flag-icon-kr"></i> </a>
    </li>
    <li class="nav-item mr-2">
        <a href="#" class="nav-link">
          <i class="flag-icon flag-icon-gb"></i></a>
    </li>

    <li class="nav-item ">

        <span class="avatar avatar-online">
          <img src="{{url('vendor/me/images/portrait/small/avatar-s-1.png')}}" alt="avatar">
        </span>
        <span style="line-height: 2.2rem;">{{ Str::title(Auth::user()->name) }}</span>
    </li>
  </ul>
