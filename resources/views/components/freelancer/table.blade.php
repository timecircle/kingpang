@props([
'query',
'total' => 12,
])

@php

$list = $query->paginate($total);
$create=route('freelancers.create');
@endphp
<x-freelancer.search />
<div id="table" class="table-responsive">
  <table class="table">
    <thead>
      <th style="width:1rem">

      </th>
      <th style="width:1rem">

      </th>
      <th style="width:16rem" > {{Theme::title('name')}}</th>
      <th> {{Theme::title('info')}}</th>
      <th> {{Theme::title('job')}} </th>
      
      <th> {{Theme::title('status')}}</th>
      <th style="width:8rem"> </th>
      <th style="width:2rem">
        <button type="button" class="btn btn-sm  btn-primary" onclick="modal_src('modal-src','{{$create}}')">
          <i class="ft ft-plus"> </i>
          {{__('Create') }}
        </button>
      </th>
     
    </thead>

    <tbody>

      @foreach ($list as $row)
      @php
      $view = route('freelancers.products.index',$row);
      $edit = route('freelancers.edit',$row);
      @endphp
      @push('outer')
      <x-modal.delete :row="$row" action="freelancers.destroy" />
      @endpush
      <tr>
        <td>
          @if(!$row->products->count())
          <button data-toggle="modal" data-target="#modal-delete-{{$row->id}}" class="btn btn-sm btn-icon btn-danger">
            <i class="ft ft-x"></i></button>
          @endif
        </td>
        <td>
          <a class="btn btn-sm btn-icon btn-primary" href="{{route('freelancers.edit',$row)}}"> <i class="icon-login"></i> </a>
        </td>
        <td>
          <div class="form-group  font-medium-1  text-bold-700">


            {{$row->name}}
          </div>

        </td>
        <td>
          <div class="form-group"> {{$row->work_email}}</div>
          <div class="form-group"> {{$row->work_phone}}</div>
        </td>
        <td>
          {{$row->job}}
        </td>
        
        <td>
          {{$row->status}}
        </td>
        <td class="font-medium-1  text-bold-600" >
        <span class="pull-right ">
          {{ $row->products->count() }}  <i class="icon-social-dropbox"></i>
         </span>
        </td>
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
    {{$list->render('vendor.pagination.simple')}}

  </div>
</div>