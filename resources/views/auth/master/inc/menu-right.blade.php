
  <ul class="nav navbar-nav float-xs-right">
                <li class="dropdown dropdown-language nav-item mr-2"><a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
                  <div aria-labelledby="dropdown-flag" class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="flag-icon flag-icon-gb"></i> English</a>
                    <a href="#" class="dropdown-item"><i class="flag-icon flag-icon-kr"></i> French</a>
                  </div>
                </li>
                <li class="dropdown dropdown-notification nav-item">
                  <a href="{{ route('auth.notifies') }}" data-toggle="dropdown" class="nav-link nav-link-label" aria-expanded="true">
                    <i class="ficon ft-bell"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>

                </li>
                <li class="dropdown dropdown-notification nav-item">
                  <a href="#" data-toggle="dropdown" class="nav-link nav-link-label" aria-expanded="false">
                    <i class="ficon ft-mail"></i><span class="tag tag-pill tag-default tag-warning tag-default tag-up">3</span></a>

                </li>
                <li class="nav-item">
                  <a href="{{ route('auth.info') }}" >
                    <span class="avatar avatar-online">
                      <img src="{{url('vendor/me/images/portrait/small/avatar-s-1.png')}}" alt="avatar">
                    </span>
                    <span class="user-name">{{ Str::title( Auth::user()->name ) }}</span></a>

                  </li>
              </ul>
