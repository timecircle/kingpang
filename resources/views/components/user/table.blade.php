@props([
'query'
])
@php
$query->where('id','<>',Auth::id());
  $list = $query->paginate();

  $roles = ['editor','shop','manager','admin'];
  $cols = ['name','email','phone','created_at'];
  @endphp
  @push('outer')
  <x-modal id="modal-create">
    <div class="modal-content">
      <x-user.edit />
    </div>
  </x-modal>
  @endpush
  <div id="table" class="table-responsive">
    <table class="table">
      <thead>
        <th style="width:1rem">


        </th>
        <th style="width:1rem">


        </th>
        @foreach ( $cols as $col )
        <th>
          {{ Str::title($col)  }}
        </th>
        @endforeach
        <th style="width:2rem">
          <button class="btn btn-sm  btn-primary" data-backdrop="false" data-toggle="modal" data-target="#modal-create">
            <i class="ft ft-plus"> </i>

          </button>
        </th>
      </thead>

      <tbody>

        @foreach ($list as $row)


        @push('outer')
        <x-modal.delete :row="$row" action="users.destroy" />
        <x-modal id="modal-edit-{{$row->id}}">
          <div class="modal-content">
            <x-user.edit :user="$row" />
          </div>
        </x-modal>
        @endpush
        <tr>
          <td>
            <button data-toggle="modal" data-target="#modal-delete-{{$row->id}}" class="btn btn-sm btn-icon btn-danger"><i class="ft ft-x"></i></button>
          </td>
          <td>
            <button data-toggle="modal" data-target="#modal-edit-{{$row->id}}" class="btn btn-sm btn-icon btn-info"><i class="ft ft-edit"></i></button>

          </td>
          @foreach ($cols as $col)
          <td>
            {{$row->$col}}


          </td>
          @endforeach
          <td>
            <a class="btn btn-sm btn-icon btn-primary" href="{{route('users.edit',$row)}}"> <i class="icon-login"></i> </a>
          </td>

        </tr>
        @endforeach
      </tbody>

    </table>

    <div class="pull-right">
      {{ $list->appends(request()->input())->render('vendor.pagination.simple') }}

    </div>
  </div>