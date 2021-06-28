@props(['product'])
@php
  $category = $product->category;
@endphp
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href='{{ route('home') }}' >
    {{Theme::title('home')}}
    </a>
  </li>
  @foreach( $category->road() as $item )
  <li class="breadcrumb-item">
    <a href='{{ url($item->link->pretty) }}' >
      {{Theme::title($item->name)}}
    </a>
  </li>
  @endforeach
  <li class="breadcrumb-item">
    <a href='{{ url($product->category->link->pretty) }}' >
      {{Theme::title($product->category->name)}}
    </a>
  </li>

</ol>
