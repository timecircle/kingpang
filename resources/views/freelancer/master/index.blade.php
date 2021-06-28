<!DOCTYPE html>
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
            @include('auth.master.inc.menu-right')
        </div>

    </nav>
      <div class="main-menu menu-fixed menu-light">
          <div class="main-menu-content menu-accordion">
            <div class="card-block text-xs-center">
              @if($freelancer->avatar)
                <img src="{{ url($freelancer->avatar->src)}}"
                class="rounded-circle img-border width-100 height-100" />
              @else
              <img src="{{url('vendor/me/images/portrait/small/avatar-s-8.png')}}" class="rounded-circle img-border height-100">


              @endif
              <div class="mt-1" >
                <a class="card-title font-medium-2" href="{{ route('freelancer.info') }}">
                  {{Theme::title($freelancer->name)}} <i class="ft-edit"></i>

                </a>

                <a href="{{route('auth.notifies')}}" class="mt-1 btn btn-info btn-block"  >
                  <i class="fa fa-exchange"></i>
                  {{ Theme::title('My KingPang') }}
                </a>
              </div>
            </div>

              @include('freelancer.master.inc.menu-main')
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
