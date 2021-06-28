@props([
'query',
'category' => 0,
'is' => 'post',
'total' => 12,
])

@php

$list = $query->paginate($total);

@endphp

@push('outer')
@if($is=='post')
<x-modal.choices id="modal-choice" action="posts.create" :list="App\Models\Category::root()->whereNull('prefix')->get()"/>
@endif
<x-modal id="modal-src" class="modal-xl h-100"></x-modal>
@endpush
<div class="mb-2">
 <x-post.search is="{{$is}}" />
</div>

<div id="table" class="table-responsive">

  <table class="table">
    <thead>
      <th style="width:2rem">

      </th>

      <th style="width:12rem">
        {{ Theme::title('code') }}
      </th>
      <th style="width:2rem">
        {{ Theme::title('priority') }}
      </th>
      <th>
        {{ Theme::title('title') }}
      </th>

      @if($is=='post')
      <th>
        {{ Theme::title('category') }}
      </th>
      @endif
      <th style="width:2rem">

        @if($is=='post')

        <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="modal" data-target="#modal-choice">
          <i class="ft ft-plus"> </i>
          {{__('Create') }}
        </button>

        @else
        @php
        $create = route('posts.create');
        @endphp
        <button class="btn btn-sm btn-icon   btn-primary" onclick=" modal_src('modal-src','{{ $create }}')">
          <i class="ft ft-plus"> </i>

          {{__('Create') }}
        </button>

        @endif

      </th>
    </thead>
    <tbody>

      @foreach ($list as $row)
      @php
      $edit=route('posts.edit',$row);
      @endphp
      @push('outer')
      <x-modal.delete :row="$row" action="posts.destroy" />
      @endpush
      <tr>
        <th>
          <button data-toggle="modal" data-target="#modal-delete-{{$row->id}}" class="btn btn-sm btn-icon btn-danger"><i class="ft ft-x"></i>
          </button>

        </th>

        <td>
          <button onclick=" modal_src('modal-src','{{ $edit }}') " class="btn btn-sm btn-icon btn-primary">
            <i class="ft ft-edit"></i>
          </button>
          {{ $row->code }}
        </td>
        <td>
          {{ $row->priority }}
        </td>
        <td>
          <div class="font-medium-1 text-bold-600" > {{ $row->name }} </div>

          <div>{{Theme::title('at') }}: {{$row->created_at}}</div>
        </td>

        @if($is=='post')
        <td>
          {{ $row->category->name }}
        </td>
        @endif
        
        <td>
          <span class="tag tag tag-pill tag-success float-xs-right">
            <a target="_blank" href="{{ url($row->link->pretty) }}">
              #Preview
            </a>
          </span>
        </td>
      </tr>

      @endforeach
    </tbody>


  </table>
  
  <div class="pull-right">
    { {$list->render('vendor.pagination.simple') }}

  </div>
</div>