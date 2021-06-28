@php
  $group= request('group','public');
  $user = request('user','king');
@endphp

@section('content')
  <x-chat.room group="{{ $group }}" user="{{ $user }}" />
@endsection

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('dev.master.inc.head')
    <body class="antialiased" >
      <div class="container-fluid mb-1">
        <h4 class="card-title ml-1 mt-1">
          KingPang  Chat
        </h4>
      </div>
      <div class="container">
        @yield('content')
      </div>

      @include('dev.master.inc.outer')
    </body>
</html>
