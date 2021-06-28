<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('meta')
    <link rel="shortcut icon" type="image/jpg" href="{{asset('theme/images/logo/ico.jpg')}}"/>
    <link rel="icon" type="image/jpg" href="{{asset('theme/images/logo/ico.jpg')}}"/>
   
    <title>@yield('page-title', 'KingPang')</title>
    @livewireStyles
    <link href="{{asset('theme/css/app.css')}}" rel="stylesheet">
    @stack('css')
  </head>

  <body {{ $attributes }} >
    @yield('header')
    @yield('body')
    @yield('footer')
    @stack('outer')
    <x-script />
    <script src="{{asset('theme/js/summernote/summernote.js')}}" ></script>
    <script src="{{asset('theme/js/extensions/toastr.min.js')}}" ></script>
    <script src="{{asset('theme/js/pickers/dateTime/moment-with-locales.min.js')}}" ></script>
    <script src="{{asset('theme/js/pickers/dateTime/bootstrap-datetimepicker.min.js')}}" ></script>
    <script src="{{asset('theme/js/pickers/pickadate/picker.js')}}" ></script>
    <script src="{{asset('theme/js/pickers/pickadate/picker.date.js')}}" ></script>
    <script src="{{asset('theme/js/pickers/pickadate/picker.time.js')}}" ></script>
    <script src="{{asset('theme/js/forms/select/select2.full.min.js')}}" ></script>
    <script src="{{asset('theme/js/app-menu.min.js')}}"></script>
    <script src="{{asset('theme/js/app.js')}}"></script>
    @livewireScripts
    @stack('script')

  </body>
</html>
