@props([
  'category'  =>  null,
  'classli' => ''
])
@php
$categories = ($category->parent_id) ? $category->parent->childs()->get() : $category->childs()->get(); 
@endphp

<ul  {{ $attributes->merge( ['class' => 'nav'] ) }} >
  @foreach($categories as $category )
    <li class="nav-item {{$classli}}">
      <a  class="nav-link"  href='{{url($category->link->pretty)}}'>
          {{ Theme::title($category->name) }} </a>
    </li>
  @endforeach
</ul>
