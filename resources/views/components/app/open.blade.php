@props([
  'route'
  ])

<div {{$attributes->merge(['class'=>'touch'])}}  onclick="modal_src('modal-src','{{$route}}')">
     {{$slot}}
  </div>