<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
  <li class="nav-item">
    <a href="{{ route('dev.index')  }}">
      <i class="icon-home"></i>
      <span class="menu-title">{{ Theme::title('dashboard')  }}</span>
    </a>
  </li>


  <li class="nav-item">
    <a href="{{ route('pages.index') }}">
      <i class="icon-docs"></i>
      <span class="menu-title">{{ Theme::title('page')  }}</span>
    </a>
  </li>

  <li class="nav-item sub-post has-sub">
    <a href="#">
      <i class="icon-book-open"></i>
      <span class="menu-title">{{ Theme::title('blogs')  }}</span>
    </a>
    <ul class="menu-content">
      <li class="nav-item">
        <a href="{{ route('categories.index',['open'=>'post'])  }}">
          <span class="menu-title">{{ Theme::title('categories')  }}</span>
        </a>
      </li>
      <li>
        <a href="{{ route('posts.index',['open'=>'post'])  }}">
          <span class="menu-title">{{ Theme::title('list')  }}</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a href="{{ route('categories.prefix','service') }}">
      <i class="icon-tag"></i>
      <span class="menu-title">{{ Theme::title('services')  }}</span>
    </a>
  </li>


  <li class="nav-item">
    <a href="{{ route('freelancers.index')  }}">
      <i class="icon-briefcase"></i>
      <span class="menu-title">{{ Theme::title('freelancer') }}</span>
    </a>
  </li>

  
  

  <li class="nav-item sub-display has-sub">
    <a href="#">
      <i class="icon-puzzle"></i>
      <span class="menu-title">{{ Theme::title('appearance')  }}</span>
    </a>
    <ul class="menu-content">
      <li class="nav-item">
        <a href="{{ route('blocks.index',['open'=>'display']) }}">
          <span class="menu-title">{{ Theme::title('static block')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('blocks.index',['prefix' => 'slider','open'=>'display']) }}">
          <span class="menu-title">{{ Theme::title('slider')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('blocks.index',['prefix' => 'list','open'=>'display']) }}">
          <span class="menu-title">{{ Theme::title('list')  }}</span>
        </a>
      </li>

    </ul>
  </li>
  <li class="nav-item sub-account has-sub">
    <a href="#">
      <i class="icon-users"></i>
      <span class="menu-title">{{ Theme::title('user')  }}</span>
    </a>
    <ul class="menu-content">
      <li class="nav-item">
        <a href="{{ route('users.index',['is'=>'admin','open'=>'account'])  }}">
          <span class="menu-title">{{ Theme::title('admin')  }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users.index') }}">
          <span class="menu-title">{{ Theme::title('users')  }}</span>
        </a>
      </li>

    </ul>
  </li>
 
</ul>


