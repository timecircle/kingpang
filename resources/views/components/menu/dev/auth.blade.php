@props(['user'])

@php
$avatar = $user->avatar ? asset($user->avatar->src) : asset('theme/images/portrait/small/avatar-s-4.png');
$route  = $user->freelancer ? route('freelancers.products.index',$user->freelancer) : route('king');
@endphp
<div class="p-2 profile-card-with-cover text-xs-center">
  <div class="card-profile-image mb-2">
    <img src="{{ $avatar }}" loading='lazy' class="width-100 height-100 rounded-circle img-border box-shadow-1" alt="Freelancer">
  </div>
  <a class=" btn btn-primary btn-sm btn-block " href="{{$route}}">
      <i class="fa fa-exchange"></i>
      <span class="text-bold-600 "> {{ Theme::title('freelancer') }} </span> </span>
    </a>
</div>

<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

  <li class="nav-item has-sub sub-order has-sub">

    <a href="#">
      <i class="icon-bag"></i>
      <span class="menu-title">{{ Theme::title('order management') }} </span>
    </a>


    <ul class="menu-content">
      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user ,'open' => 'order']) }}" class="nav-link">
          <span class="menu-title">{{ Theme::title('all') }} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user,'status'=>'order' ,'open' => 'order']) }}" class="nav-link">

          <span class="menu-title">{{ Theme::title('unpaid') }} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user,'status'=>'paid' ,'open' => 'order']) }}" class="nav-link">

          <span class="menu-title">{{ Theme::title('paid') }} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user,'status'=>'pending' ,'open' => 'order']) }}" class="nav-link">

          <span class="menu-title">{{ Theme::title('pending') }} </span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user,'status'=>'process' ,'open' => 'order']) }}" class="nav-link">

          <span class="menu-title">{{ Theme::title('in process') }} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user,'status'=>'edit' ,'open' => 'order']) }}" class="nav-link">
          <span class="menu-title">{{ Theme::title('edit') }} </span>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('auth.orders',['user' => $user,'status'=>'finish' ,'open' => 'order']) }}" class="nav-link">
          <span class="menu-title">{{ Theme::title('finish') }} </span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('auth.orders', ['user' => $user,'status'=>'needreview' ,'open' => 'order']) }}" class="nav-link">
          <span class="menu-title">{{ Theme::title('need review') }} </span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('auth.orders', ['user' => $user,'status'=>'cancel' ,'open' => 'order'] ) }}" class="nav-link">

          <span class="menu-title">{{ Theme::title('cancel') }} </span>
        </a>
      </li>

    </ul>
  </li>
  <li class="nav-item ">
    <a href="{{ route('auth.favorites',$user) }}" class="nav-link">

      <i class="icon-heart"></i>
      <span class="menu-title">{{ Theme::title('favorites')  }} </span>
    </a>
  </li>

  <li class="nav-item ">
    <a href="{{ route('auth.rewards',$user) }}" class="nav-link">

      <i class="icon-present"></i>
      <span class="menu-title">{{ Theme::title('voucher - rewards') }} </span>
    </a>
  </li>

  <li class="nav-item ">
    <a href="{{ route('auth.tranactions',$user) }}" class="nav-link">

      <i class="icon-wallet"></i>
      <span class="menu-title">{{ Theme::title('transaction') }} </span>
    </a>
  </li> 
</ul>