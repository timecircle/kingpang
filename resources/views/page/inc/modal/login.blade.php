
<div class='modal fade' id="modal-login"
  tabindex='-1' role='dialog'>
  <div class="modal-dialog modal-sm" role="document">
      <livewire:auth.login />

      <form id="firebase_login" method="post" class="none" action="{{route('firebase.login')}}" >
        @csrf
        <input type="hidden" name="login_by" id="login_by" />
        <input type="hidden" name="name" id="name" />
        <input type="hidden" name="email" id="email" />
        <input type="hidden" name="firebase_uid" id="firebase_uid" />
        <input type="hidden" name="firebase_token" id="firebase_token" />
    
      </form>
    </div>
</div>
