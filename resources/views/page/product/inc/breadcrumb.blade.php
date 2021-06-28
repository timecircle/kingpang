@php
  $ul[  route('home') ] = Theme::title('home');
  $ul[  url($productType->link->pretty) ] = $productType->name;
  if(isset($productCategory)){
      foreach(array_reverse($productCategory->road()) as $productCategory ){
        $ul[ url($productCategory->link->pretty) ]  =  $productCategory->name;
      }
      $ul[ url($productCategory->link->pretty) ] =  $productCategory->name;
  }
@endphp

<ol class="breadcrumb">
  @foreach($ul as $link => $title)
    <li class="breadcrumb-item">
      <a href='{{ $link }}' >
        {{  $title }}
      </a>
    </li>
  @endforeach
</ol>
