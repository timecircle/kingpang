@props([
'user'=>null,
])
@php
$flags=[
'en' => ['english','flag-icon-gb'],
'vi' => ['vietnamese','flag-icon-vn'],
'kr' => ['korean','flag-icon-kr'],
];

$locale = $flags[App::getLocale()];
unset($flags[App::getLocale()]);


@endphp
@once

@push('script')

<script>
  $('.inbox').mouseover(function() {
    var inbox = $(this).children(".inbox-show");
    inbox.show();
  });
  $('.inbox-show').mouseout(function() {
    $(this).hide();
  });
</script>

@endpush

@endonce
<ul class="nav navbar-nav font-medium-2 text-bold-400">
  <li class="dropdown   nav-item">
    <a data-toggle='dropdown' class="nav-link dropdown-toggle nav-link"> {{ Theme::title('explore') }}</a>
    <div class="dropdown-menu  dropdown-menu-right">
      <a class="dropdown-item" href="{{ url(Category::findCode('blog')->link->pretty) }}">
        {{ Theme::title('blog') }}</a>

      <a class="dropdown-item" href="{{ url(Category::findCode('faq')->link->pretty) }}">
        {{ Theme::title('faq') }}</a>
    </div>
  </li>


  @if(isset($user))
  <li class="inbox nav-item">
    <a href="#" class="nav-link">
      {{ Theme::title('messenger') }}
    </a>
    <div class="inbox-show shadow">
      <x-user.inbox-board :user="$user" />

    </div>

  </li>

  <li class="nav-item">
    <a href="{{ route('auth.orders',$user) }}" class="nav-link">
      {{ Theme::title('my KingPang') }}
    </a>

  </li>


  <li class="dropdown  nav-item">
    <a href="#" data-toggle="dropdown" class="nav-link">
      @if($user->avatar)
      <img loading="lazy" class="avatar avatar-online" src="{{ url($user->avatar->src) }} " />
      @else
      <img loading="lazy" class="avatar avatar-online" src="{{ asset('theme/images/portrait/small/avatar-s-1.png') }} " />
      @endif

    </a>
    <ul class="dropdown-menu dropdown-menu-right">
    <li class="dropdown-item">
        <a href="{{ route('users.edit',$user) }}" class="nav-link">
          {{ Theme::title('profile') }}
        </a>

      </li>
      @if(isset($user->freelancer) )
      <li class="dropdown-item">
        <a href="{{route('freelancers.products.index',$user->freelancer)}}" class="nav-link"> {{ Theme::title('become a freelancer') }} </a>
      </li>
      @else
      <li class="dropdown-item">
        <a href="{{route('king')}}" class="nav-link"> {{ Theme::title('become a freelancer') }} </a>
      </li>
      @endif
     
      <li class="dropdown-item">
        <a href="{{route('auth.settings',$user)}}" class="nav-link">
          {{ Theme::title('setting') }}
        </a>

      </li>
      <li class="dropdown-item line-t">
        <a href="{{route('logout')}}" class="nav-link"> {{ Theme::title('logout') }} </a>
      </li>
    </ul>
  </li>
  @else
  <li class="nav-item">
    <a href="{{route('king')}}" class="nav-link"> {{ Theme::title('become a freelancer') }} </a>
  </li>
  <li class="nav-item box pl-1 pr-1">
    <a href="#" data-backdrop="false" data-toggle="modal" data-target="#modal-login" class="nav-link">
      {{ Theme::title('sign in') }}
    </a>


  </li>
  @endif
  <li class="dropdown nav-item">

    <a href="#" data-toggle='dropdown' class="dropdown-toggle nav-link">
      <i class='flag-icon {{$locale[1]}}'></i> </a>

    <div class="dropdown-menu  dropdown-menu-right">
      @foreach( $flags as $lang => $flag )
      <a class="dropdown-item" href="{{route('trans',$lang)}}">
        <i class='flag-icon {{ $flag[1] }}'></i> {{ Theme::title($flag[0]) }}</a>
      @endforeach

    </div>

  </li>
</ul>