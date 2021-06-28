<ul class="nav  nav-main pt-1  app-width">
  <li class="nav-item flex-1">
    <a class="nav-link active" id="tab-home" data-toggle="tab" href="#home" aria-expanded="true">
      <span class="ir">
        <i class="ft ft-home"></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('home') }} </div>
    </a>
  </li>
  <li class="nav-item flex-1">
    @auth
    <a class="nav-link" id="tab-inbox" data-toggle="tab" href="#inbox" aria-expanded="false">
      <span class="ir">
        <i class="ft ft-inbox "></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('inbox') }} </div>
    </a>
    @else
    <a class="nav-link" data-toggle="modal" data-target="#modal-login">
      <span class="ir">
        <i class="ft ft-inbox "></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('inbox') }} </div>
    </a>

    @endif
  </li>

  <li class="nav-item flex-1">
    <a class="nav-link" id="tab-search" data-toggle="tab" href="#search" aria-expanded="false">
      <span class="ir">
        <i class="ft ft-search "></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('search') }} </div>
    </a>
  </li>


  <li class="nav-item flex-1">
    @auth
    <a class="nav-link " id="tab-home" data-toggle="tab" href="#notify" aria-expanded="true">
      <span class="ir">
        <i class="ft ft-bell"></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('notify') }} </div>
    </a>
    @else

    <a class="nav-link" data-toggle="modal" data-target="#modal-login">
      <span class="ir">
        <i class="ft ft-bell"></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('notify') }} </div>
    </a>
    @endif
  </li>
  <li class="nav-item flex-1">
    @auth
    <a class="nav-link" id="tab-account" data-toggle="tab" href="#account" aria-expanded="false">
      <span class="ir">
        <i class="ft ft-user"></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('account') }} </div>
    </a>
    @else
    <a class="nav-link" data-toggle="modal" data-target="#modal-login">
      <span class="ir">
        <i class="ft ft-user"></i>
      </span>
      <div class="font-small-2"> {{ Theme::title('account') }} </div>
    </a>
    @endif
  </li>
</ul>