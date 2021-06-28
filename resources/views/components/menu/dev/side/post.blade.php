<ul class="menu-content">
  
  @foreach(Category::root()->whereNull('ext')->get() as $item)
    <li class="nav-item">
      <a href="{{ route('posts.index',['category' => $item,'open'=>'post' ])  }}">
        <span class="menu-title">{{ Theme::title($item->name)  }}</span>
      </a>
    </li>
  @endforeach
</ul>
