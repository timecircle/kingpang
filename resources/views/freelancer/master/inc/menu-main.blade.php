<ul id="main-menu-navigation" data-menu="menu-navigation"
class="navigation navigation-main">

<li class="nav-item">
      <a href="{{ route('freelancer.index')  }}">
        <i class="icon-bar-chart"></i>
        <span class="menu-title">{{ Theme::title('dasboard') }}</span></a>
</li>

  <li class="nav-item has-sub
    {{ (Route::currentRouteName() == 'freelancer.orders')? 'open' : '' }} ">
    <a href="#">
        <i class="icon-briefcase"></i>
      <span class="menu-title">{{ Theme::title('sales manager') }} </span>
    </a>
    <ul class="menu-content">
        <li class="nav-item">
          <a href="{{ route('freelancer.orders') }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('all') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('freelancer.orders',['status'=>'order' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('unpaid') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('freelancer.orders',['status'=>'paid' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('paid') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('freelancer.orders',['status'=>'pending' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('pending') }} </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('freelancer.orders',['status'=>'process' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('in process') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('freelancer.orders',['status'=>'edit' ]) }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('edit') }} </span>
          </a>
        </li>

      
        <li class="nav-item">
          <a href="{{ route('freelancer.orders',['status'=>'finish' ]) }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('finish') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'cancel' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('cancel') }} </span>
          </a>
        </li>

    </ul>

  </li>
  <li class="nav-item">
    <a href="{{ route('freelancer.products')  }}">
      <i class="icon-grid"></i>
      <span class="menu-title">{{ Theme::title('my service')  }}</span>
    </a>
  </li>
  <li class="nav-item has-sub {{ (Route::currentRouteName() == 'freelancer.info')? 'open' : '' }}">
    <a href="#">
      <i class="icon-settings"></i>
      <span class="menu-title"> {{Theme::title('config')}}</span>
    </a>

    <ul class="menu-content">

      <li class="nav-item">
        <a href="{{ route('freelancer.info') }}" class="nav-link">
          <span class="menu-title"> {{Theme::title('info')}} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('freelancer.info',['tab' => 'edu']) }}" class="nav-link">
          <span class="menu-title"> {{Theme::title('education')}} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('freelancer.info',['tab' => 'cer']) }}" class="nav-link">
          <span class="menu-title"> {{Theme::title('certificate')}} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('freelancer.info',['tab' => 'exp']) }}" class="nav-link">
          <span class="menu-title"> {{Theme::title('experience')}} </span>
        </a>
      </li>
    </ul>
  </li>
</ul>
