@props([
  'id'  =>  0,
  'classli' => ''
])
@php
 
$categories = App\Models\Category::whereParentId($id)->get();
@endphp

<ul  {{ $attributes->merge( ['class' => 'nav'] ) }} >
  @foreach($categories as $category )
    <li class="nav-item {{$classli}}">
      <a  class="nav-link"  href='{{url($category->link->pretty)}}'>
          {{$category->name}} </a>
    </li>
  @endforeach
</ul>
