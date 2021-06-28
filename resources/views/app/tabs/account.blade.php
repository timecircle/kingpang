@php
$user= Auth::user();
$avatar = empty($user->avatar) ? asset('theme/images/portrait/small/avatar-s-4.png') : asset($user->avatar->src);
@endphp
<x-block style="overflow: auto;" class="app-w bg-primary p-1 mb-3 line-bot">

  <div class="media profil-cover-details pull-left">
    <label class="profile-image mr-1">
      <img src=" {{ $avatar }}" style="width:80px; height:80px" class="shadow rounded-circle img-border">
    </label>

  </div>
  <div class="pull-left">
    <p class="black font-medium-2 text-bold-600">
      {{ empty($user) ? 'Guest' :  $user->name }}
    </p>
    <p>
      {{ empty($user) ? 'Welcome to KingPang' :  "Hi! $user->name" }}
    </p>
  </div>
@auth
  <div class="pull-right px-6 py-4 sm:block">
      <a href="{{route('app.logout')}}">{{Theme::title('logout')}}</a>
  </div>
@endauth  
</x-block>
@auth

<x-block class="content-header">
  <h4> {{Theme::title('my king pang')}} </h4>
</x-block>
<x-block class="section  mb-3 ">
  <ul class="nav nav-bar">
    <li class="line-bot p-1 nav-item">
      <x-app.open class="tab-row" route="{{route('app.favorites',$user)}}">


        {{ Theme::title('saved') }}
      </x-app.open>

    </li>


    <li class="line-bot p-1 nav-item">
      <x-app.open class="tab-row" route="{{route('app.orders',$user)}}">

        {{ Theme::title('manage order') }}
      </x-app.open>


    </li>

  </ul>
</x-block>


@else
<x-block class="section  mb-3 ">
  <ul class="nav nav-bar">
    <li class="line-bot p-1 nav-item">

      <label class="touch w-100" data-toggle="modal" data-target="#modal-login">

        <i class="icon-plus"> </i> {{ Theme::title('sign in') }}

      </label>
    </li>

  </ul>
</x-block>

@endauth

<x-block class="content-header">
  <h4> {{Theme::title('general')}} </h4>
</x-block>

<x-block class="section  mb-3 ">
  <ul class="nav nav-bar">

    @foreach(['privacy-policy','term-use','term-payment'] as $code )
    @php
    $post = Post::findCode($code);
    @endphp
    @push('outer')
    <x-modal class="app-w m-0" id="general-{{$code}}">
      <x-app.static :post="$post" />
    </x-modal>
    @endpush
    @if($post)
    <li class="line-bot p-1 nav-item">
      <div data-toggle="modal" data-target="#general-{{$code}}" class="touch tab-row">

        {{ Theme::title($post->name) }}
      </div>
    </li>
    @endif
    @endforeach

  </ul>
</x-block>