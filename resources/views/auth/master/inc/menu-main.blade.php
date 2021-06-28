<ul id="main-menu-navigation" data-menu="menu-navigation"
class="navigation navigation-main">

  <li class="nav-item ">
    <a href="{{ route('auth.favorites') }}" class="nav-link">

      <i class="icon-heart"></i>
      <span class="menu-title">{{ Theme::title('favorites')  }} </span>
    </a>
  </li>

  <li class="nav-item has-sub
    {{ (Route::currentRouteName() == 'auth.orders')? 'open' : '' }} ">
    <a href="#">
        <i class="icon-bag"></i>
      <span class="menu-title">{{ Theme::title('order management') }} </span>
    </a>


    <ul class="menu-content">
        <li class="nav-item">
          <a href="{{ route('auth.orders') }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('all') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'order' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('unpaid') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'paid' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('paid') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'pending' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('pending') }} </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'process' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('in process') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'edit' ]) }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('edit') }} </span>
          </a>
        </li>

        
        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'finish' ]) }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('finish') }} </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'needreview' ]) }}" class="nav-link">
            <span class="menu-title">{{ Theme::title('need review') }} </span>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auth.orders',['status'=>'cancel' ]) }}" class="nav-link">

            <span class="menu-title">{{ Theme::title('cancel') }} </span>
          </a>
        </li>

    </ul>
  </li>

  <li class="nav-item ">
    <a href="{{ route('auth.rewards') }}" class="nav-link">

      <i class="icon-present"></i>
      <span class="menu-title">{{ Theme::title('voucher - rewards') }} </span>
    </a>
  </li>

  <li class="nav-item ">
    <a href="#" class="nav-link">

      <i class="icon-wallet"></i>
      <span class="menu-title">{{ Theme::title('transaction') }} </span>
    </a>
  </li>

  <li class="nav-item has-sub">
    <a href="#">
      <i class="icon-settings"></i>
      <span class="menu-title"> {{Theme::title('config')}}</span>
    </a>

    <ul class="menu-content">

      <li class="nav-item">
        <a href="{{ route('auth.info') }}" class="nav-link">
          <span class="menu-title"> {{Theme::title('info')}} </span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="{{ route('auth.changepass') }}"  class="nav-link">
          <span class="menu-title">{{ Theme::title('changepass') }} </span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="#"  class="nav-link">

          <span class="menu-title">{{ Theme::title('delete account')  }} </span>
        </a>
      </li>
    </ul>


  </li>



  <li class="nav-item ">
    <a href="{{ route('logout') }}" class="nav-link">
        <i class="icon-power"></i>
      <span class="menu-title">{{__('Logout')}} </span>
    </a>
  </li>
</ul>
