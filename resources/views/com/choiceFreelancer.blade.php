@php
    use App\Models\User;
    $id   = uniqid('choice_');

    $user = empty($user_id) ? User::whereDoesntHave('freelancer')->first() : User::find($user_id);
@endphp
<span id="{{$id}}">
  <button type="button" id="btn-choice-user" data-toggle="modal"
  data-target="#modal-{{$id}}" > <i class="fa fa-exchange"></i>
  <span> {{$user->email}} </span> </button>
  <input type="hidden"  name="user_id" value="{{$user->id}}" />
</span>

@push('outer')
  <div class="modal fade in" id="modal-{{$id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <livewire:auth.choicefreelancer call="{{$id}}" />
    </div>
  </div>
@endpush

@push('script')
  <script>
      function {{$id}}(choice){
          $('#{{$id}} button span').text(choice[1]);
          $('#{{$id}} input[type=hidden]').val(choice[0]);
      }
  </script>
@endpush
