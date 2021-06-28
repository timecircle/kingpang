<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('dev.master.inc.head')
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns"
    class="vertical-layout vertical-menu 2-columns fixed-navbar antialiased" >
    <nav class="header-navbar navbar-fixed-top navbar-light">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">

              <li class="nav-item"><x-logo />
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
              @if($user->avatar)
                <img src="{{ url($user->avatar->src)}}"
                class="rounded-circle img-border width-100 height-100" />
              @else
              <img src="{{url('vendor/me/images/portrait/small/avatar-s-8.png')}}" class="rounded-circle img-border height-100">


              @endif

              <div class="mt-1" >

                @if($user->freelancer)
                  <a href="{{route('freelancer.index')}}" class="mt-1 btn btn-info btn-block"  > <i class="fa fa-exchange"></i>
                      {{  Theme::title('freelancer')  }}
                  </a>
                @else
                  <a href="{{route('auth.join')}}" class="mt-1 btn btn-info btn-block"  >
                      {{  Theme::title('join freelancer') }}
                  </a>
                @endif
              </div>
            </div>

              @include('auth.master.inc.menu-main')
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

@push('outer')

<div class='modal fade' id="modal-account"
  tabindex='-1' role='dialog'>
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
    <form class="form" action="{{  route('users.update',$user) }}"
      method="post">
      @csrf
      @method('PUT')
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> {{Str::title(__('edit profile'))}}</h4>
        </div>

        <div class="modal-body">


              <div class="form-body">
                <div class="form-group">

                  @include('com.avatarChange',[
                    'src' => empty($user->avatar) ? null : $user->avatar->src
                    ])

                </div>
                <div class="form-group">
                  <label>{{Str::title(__('display name')) }}</label>
                  <input type="name" value="{{$user->name}}"
                  class="form-control"
                  name="name"  />
                </div>



              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-primary">Accept</button>
         </div>


     </form>
   </div>
    </div>
</div>

@endpush
