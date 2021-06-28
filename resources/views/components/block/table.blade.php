@props([
'query',
'total'=>12,
'prefix'=>null,
])

@php

$list = $query->paginate($total);

@endphp

@push('outer')
<x-modal class="h-100" id="modal-create">
 
  <x-block.edit prefix="{{$prefix}}" />
</x-modal>

@endpush
<div class="mb-2">
  <x-block.search />
</div>
<div id="table" class="table-responsive">
  <table class="table">
    <thead>
      <th style="width:1rem">

      </th>
      <th style="width:1rem">

      </th>
      <th>
        {{Theme::title('code')}}
      </th>
      <th>
      {{Theme::title('priority')}}
      </th>
      <th>
        {{Theme::title('title')}}
      </th>
      <th style="width:1rem">
        <button type="button" class="btn btn-sm  btn-primary" data-backdrop="false" data-toggle="modal" data-target="#modal-create">
          <i class="ft ft-plus"> </i>
          {{__('Create') }}
        </button>
      </th>
    </thead>

    <tbody>

      @foreach ($list as $row)
      @push('outer')

      <x-modal.delete :row="$row" action="blocks.destroy" />
      <x-modal class="h-100" id="modal-edit-{{$row->id}}">

        <x-block.edit :block="$row" prefix="{{$prefix}}" />

      </x-modal>
      @endpush
      <tr>
        <td>
          <button data-toggle="modal" data-target="#modal-delete-{{$row->id}}" class="btn btn-sm btn-icon btn-danger"><i class="ft ft-x"></i></button>



        </td>
        <td>
        <button data-toggle="modal" data-backdrop="false" data-target="#modal-edit-{{$row->id}}" class="btn btn-sm btn-icon btn-primary"><i class="ft ft-edit"></i></button>


        </td>
        <td>
          {{$row->code}}
        </td>
        <td>
          {{$row->priority}}
        </td>
        <td>
          {{$row->title}}
        </td>
        <td></td>

      </tr>
      @endforeach
    </tbody>

  </table>

  <div class="pull-right">
    {{ $list->appends(request()->input())->render() }}

  </div>
</div>
