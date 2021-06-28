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
