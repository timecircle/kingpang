@props(['category'])

<div class="container">
  <div class="row mt-1">
    <div class="col-md-6 ">
      <ul class="breadcrumb p-0 ">
        <li class="breadcrumb-item ">
          <x-logo />
        </li>
        @foreach($category->road() as $item)
        <li class="breadcrumb-item  font-medium-2  text-bold-600">
          <a href="{{url($item->link->pretty)}}">
            {{ $item->name  }}
          </a>
        </li>
        @endforeach
        <li class="breadcrumb-item  font-medium-2  text-bold-600">
          <a class="nav-link" href="{{url($category->link->pretty)}}">
            {{ $category->name }}
          </a>
        </li>
      </ul>

    </div>
    <div class="col-md-6 ">
      <div class="float-xs-right">
        <x-menu.categories 
        class="navbar-nav" classli="font-medium-2 text-bold-600" 
        :category="$category" />
      </div>
    </div>
  </div>
</div>