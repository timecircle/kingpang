<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link rel="KingPang" type="image/jpg" href="{{asset('theme/images/logo/ico.jpg')}}" />
  <title>@yield('page-title', 'KingPang')</title>
  @livewireStyles
  <link href="{{asset('theme/css/app.css')}}" rel="stylesheet">
  <link href="{{asset('theme/css/mobile.css')}}" rel="stylesheet">

  <style>
    .app-w {
      width: 420px;
    }
  </style>
  @stack('css')
</head>

<body>
  <div id="app-body" class="app-w">
    @yield('content')
  </div>

  @stack('outer')

  <x-modal class="ml-0" style="margin-top: 20rem;" id="modal-login">
    <x-app.login />
  </x-modal>
  <x-modal class="w-100 h-100 m-0" id="modal-src">

  </x-modal>
  @livewireScripts
  <x-script />
  <script>
    $happ = $(window).height();
    $wapp = $(window).width();
    $('.app-h').height($happ);
  </script>
  <script src="{{asset('theme/js/extensions/toastr.min.js')}}"></script>

  <script src="{{asset('theme/js/pickers/dateTime/moment-with-locales.min.js')}}"></script>
  <script src="{{asset('theme/js/pickers/dateTime/bootstrap-datetimepicker.min.js')}}"></script>
  <script src="{{asset('theme/js/app-menu.min.js')}}"></script>
  <script src="{{asset('theme/js/app.js')}}"></script>
  <script src="{{asset('theme/js/theme.js')}}"></script>


  {{ Theme::toastr() }}

  @stack('script')
</body>

</html>