@props([
'selected' => 0,
'prefix' =>null,
'root' => 0,
])

@php

$id = uniqid('select_');
$index = 0;
$selected = empty($selected) ? 0 : $selected;
$query = Category::whereParentId($root);
$query = empty($prefix) ? $query->whereNull('prefix') : $query->wherePrefix($prefix);

@endphp
<select {{ $attributes }}>
  @foreach( $query->arrange() as $item )
  @php
  $name = str_repeat(": :: ", $item->level).$item->name ;
  @endphp
  <option {{ ($item->id == $selected) ? 'selected' : '' }} value="{{ $item->id }}"> {{ $name }}</option>

  @endforeach
</select>