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
    <ul class="menu-content">

      <li class="nav-item">
        <a href="{{ route('product_types.index',['open' => 'config'])  }}">
          <span class="menu-title">{{ Theme::title('product type')  }}</span></a>
      </li>

      <li class="nav-item">
        <a href="{{ route('categories.index',['open' => 'config'])  }}">
          <span class="menu-title">{{ Theme::title('categories')  }}</span></a>
      </li>

      <li class="nav-item has-sub open">
        <a href="#">
          <span class="menu-title">{{ Theme::title( 'home page')  }}</span>
        </a>

        <ul class="menu-content">
             <li class="nav-item">
               <a href="#">
                 <span class="menu-title">{{ Theme::title( 'slider')  }}</span></a>
             </li>
             <li class="nav-item">
               <a href="#">
                 <span class="menu-title">{{ Theme::title('content')  }}</span></a>
             </li>
        </ul>
      </li>

    </ul>

  </li>

@endif


<li class="nav-item has-sub {{ request('open') =='content' ? 'open' : '' }}">
  <a href="#">
    <i class="icon-docs"></i><span class="menu-title">{{ Theme::title('content')  }} </span>
  </a>
  <ul class="menu-content">
    <li class="nav-item">
      <a href="{{ route('posts.index',['open'=>'content']) }}">
        <span class="menu-title">{{ Theme::title('static page')  }}</span></a>
    </li>

    @foreach(Category::root()->get() as $item)
       <li class="nav-item">
         <a href="{{ route('posts.index',['category' => $item])  }}">
           <span class="menu-title">{{ Theme::title($item->name)  }}</span></a>
       </li>
     @endforeach

  </ul>
</li>
@if($role ==  'admin')
  <li class="nav-item has-sub">
      <a href="#">
        <i class="icon-users"></i><span class="menu-title"> {{Theme::title('account')}}</span>
      </a>
      <ul class="menu-content">


        <li class="nav-item">
          <a href="{{ route('users.index',['is'=>'admin'])  }}">
            <span class="menu-title">{{ Theme::title('admin') }}</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index',['is'=>'freelancer'])  }}">
            <span class="menu-title">{{ Theme::title('freelancer') }}</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index',['is'=>'customer'])  }}">
            <span class="menu-title">{{ Theme::title('customer') }}</span></a>
        </li>
      </ul>
  </li>
@endif
<li class="nav-item ">
    <a href="{{ route('logout') }}">
    <i class="icon-power"></i>
    <span class="menu-title">  {{  Theme::title('logout')  }}</span>
    </a>
</li>
</ul>
