<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
  
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

 
</ul>


