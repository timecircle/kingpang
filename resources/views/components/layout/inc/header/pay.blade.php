
@php
  $name  = request()->route()->getName();
@endphp
<x-block class="container-fluid bg-white sticky-wrapper line-b" >
  <div class="container mt-1">
    <ul class="breadcrumb p-0 ">
      <li class="breadcrumb-item ">
        <x-logo />
      </li>
      <li class="breadcrumb-item  font-medium-2 {{ ($name  ==  'confirm') ? 'primary' :'' }}  text-bold-600">
        {{  Theme::title('confirm & pay') }}
      </li>
      <li class="breadcrumb-item  font-medium-2 {{ ($name ==  'requirement') ? 'primary' :'' }}  text-bold-600">
        {{  Theme::title('submit requirement') }}
      </li>
    </ul>

  </div>
</x-block>
