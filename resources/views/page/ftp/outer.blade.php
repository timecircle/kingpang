

<form id="firebase_login" method="post" class="none" action="{{route('firebase.login')}}" >
  @csrf
  @foreach(['login_by','name','email',
        'firebase_uid',
        'firebase_token'] as $ip)
    <input type="hidden" name="{{$ip}}" id="{{$ip}}" />
  @endforeach
</form>


<div class="modal fade" id="modal-if"
  tabindex="-1" role="dialog">
  <div id="if-content" style="display:none" class=" modal-xl h-100">

  </div>
</div>

<div class='modal fade' id="modal-login"
  tabindex='-1' role='dialog'>
  <div class="modal-dialog modal-sm" role="document">
      <livewire:auth.login />
    </div>
</div>

<div class='modal fade' id="modal-register"
  tabindex='-1' role='dialog'>
  <div class="modal-dialog modal-sm" role="document">
        <livewire:auth.register />
    </div>
</div>


@stack('outer')
  {{
    Theme::js([
        'https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js',
        'https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js',
        url('vendor/me/inc/js/vendors.min.js'),
        url('vendor/me/inc/js/summernote/summernote.js'),
        url('vendor/me/js/core/app-menu.min.js'),
        url('vendor/me/js/core/me.js'),
        url('vendor/me/js/core/firebase.js'),
        url('vendor/me/js/core/app.js'),
    ])
  }}

@livewireScripts
@stack('script')
