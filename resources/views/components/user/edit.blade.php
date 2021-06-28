@props([
'user' => new App\Models\User,
])
@php

$roles = ['editor','shop','manager','admin'];
$action = ($user->id) ? route('users.update',$user) : route('users.store');
$method = ($user->id) ? 'PUT' : 'POST';
$title = ($user->id) ? 'Edit Account' : 'Create Account';
@endphp
<x-form class="form" enctype="multipart/form-data" action="{{  $action }}" method="{{$method}}">
  <div class="modal-header">
    <div class="pull-left">
      <h4 class="modal-title"><i class="fa fa-road2"></i> {{$title}}</h4>
    </div>
    <div class="pull-right">
      <select  name="admin_role">
        <option>
           {{ Theme::title('guest') }}
        </option>
        @foreach($roles as $role)
        @php 
          $selected = ($role == $user->admin_role) ? 'selected' : '';
        @endphp
        <option {{  $selected }} value="{{ $role }}">
           {{ Theme::title($role) }}
        </option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>

  <div class="modal-body">


    <div class="form-body">
      <div class="form-group">
        <label>{{ Theme::title('name') }}</label>
        <input type="name" value="{{$user->name}}" class="form-control" name="name" id="name" />
      </div>
      <div class="form-group">
        <label>{{ Theme::title('email') }}</label>
        <input type="email" value="{{$user->email}}" class="form-control" name="email" id="email" />
      </div>
      <div class="form-group">
        <label>{{ Theme::title('password') }}</label>
        <input type="password" class="form-control" name="password" id="password" />
      </div>
      <div class="form-group">
        <label>{{ Theme::title('password confirmation') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>

    </div>

  </div>

</x-form>