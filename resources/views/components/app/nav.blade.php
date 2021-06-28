@props([
  'tabs'
])
@php 

@endphp
<ul {{ $attributes->merge(['class' => 'nav nav-main']) }} >

  @foreach( $tabs as $key => $value )
    @php
    $tab = (object) $value;
    $toggle = 'data-toggle=tab';

    if(isset($tab->check) && !Auth::check() ){
      $toggle = 'data-toggle=modal data-target=#modal-login';
    }

    @endphp
    <li class="nav-item  flex-1">

      <a class="nav-link touch p-1 {{ $loop->first ? 'active' : ''  }}" id="tab-{{$key }}" href="#{{$key }}" {{ $toggle }}>
        @if(isset($tab->icon ))
        <span class="ir">
          <i class="{{ $tab->icon }}"></i>
        </span>
        @endif
        <div class="font-small-1"> {{ $tab->title }} </div>
      </a>

    </li>

  @endforeach

</ul>