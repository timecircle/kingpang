<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')
    <title>@yield('page-title', 'KING PANG')</title>
    @livewireStyles
    <link href="{{asset('theme/css/app.css')}}" rel="stylesheet">
    @stack('css')
</head>
