<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('dev.master.inc.head')
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns"
    class="vertical-layout vertical-menu 2-columns fixed-navbar antialiased" >
    <nav class="header-navbar navbar-fixed-top navbar-light">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">

              <li class="nav-item"><a href="/" class="nav-link">
                @include('page.inc.brand')</a>
              </li>
              <li class="nav-item hidden-sm-down float-xs-right">
                <a href="#" class="nav-link fixed nav-menu-main menu-toggle hidden-xs">
                  <i class="ft-menu font-large-1"></i>
                </a>
               </li>
            </ul>
          </div>
        </div>
        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
            @include('dev.master.menu.right')
        </div>

    </nav>
      <div class="main-menu menu-fixed menu-light">
          <div class="main-menu-content menu-accordion">
              @include('dev.master.menu.main')
          </div>
      </div>


      <div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            @yield('title')
          </div>
          <div class="content-body">
            @yield('content')
          </div>

        </div>

      </div>
      @include('dev.master.inc.outer')
    </body>
</html>
