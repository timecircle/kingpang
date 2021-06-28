<ul class="menu-content">

  <li class="nav-item">
    <a href="{{ route('product_types.index',['open' => 'config'])  }}">
      <span class="menu-title">{{ Theme::title('product type')  }}</span></a>
  </li>

  <li class="nav-item">
    <a href="{{ route('categories.index',['open' => 'config'])  }}">
      <span class="menu-title">{{ Theme::title('categories')  }}</span></a>
  </li>

  <li class="nav-item">
    <a href="{{ route('sliders.index',['open' => 'config']) }}">
      <span class="menu-title">{{ Theme::title( 'slider')  }}</span></a>
  </li>

</ul>
