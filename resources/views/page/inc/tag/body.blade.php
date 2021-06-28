
<body class="{{ $class ?? 'horizontal-layout' }}" >
  @yield('body')
  @include('page.inc.footer')
  @include('page.inc.outer')
</body>
