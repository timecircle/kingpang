<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  @stack('meta')
  <title>@yield('page-title', 'KING PANG')</title>
  <!-- Fonts -->
  @livewireStyles
  <link href="{{asset('theme/css/app.css')}}" rel="stylesheet">
  <link href="{{asset('theme/css/mobile.css')}}" rel="stylesheet">



  @if(request()->device)
  @php
    $screen_width = request()->device->screen_width.'px';
    $device = request()->device;
  @endphp
  
  <style>
    .app-content,
    .app-width {
      width: {{$screen_width }};
    }
  </style>

  @endif
  @stack('css')

</head>

<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column ">
  <div id="app-body" class="app-content">
    @yield('content')
  </div>

  @stack('outer')
  <x-modal  style="margin-top:0" class="app-width" id="modal-if">
    <div id="if-content" class="w-100 bg-white h-100">


    </div>
  </x-modal>
  
  <x-modal style="margin-top : 50%" id="modal-login">
    <x-app.login />
  </x-modal>

  <input type="hidden" id="__url" value="{{ Theme::url() }}" />

  @livewireScripts
  <x-script />

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