@props([
'query',
'total' => 12,
'freelancer',
])

@php

$list = $query->paginate($total);

@endphp

@push('outer')
<x-modal.choices id="modal-choice" action="freelancers.products.create" :params="['freelancer'=>$freelancer->id]" :list="App\Models\Category::root()->wherePrefix('service')->get()" />
<x-modal id="modal-src" class="modal-xl h-100"></x-modal>
@endpush
<div class="mb-2">
  <x-product.search />
</div>
<div id="table" class="table-responsive">
  <table class="table">
    <thead>
      <th style="width:1rem">

      </th>
      <th style="width:1rem">

      </th>
      <th style="width:24rem">
        Name
      </th>
      <th>
        Category
      </th>



      <th style="width:2rem">
        Status
      </th>
      <th>
        <span class="float-xs-right">
          Price
        </span>
      </th>
      <th style="width:2rem">
        <button type="button" class="btn btn-sm  btn-primary" data-toggle="modal" data-target="#modal-choice">
          <i class="ft ft-plus"> </i>
          {{__('Create') }}
        </button>
      </th>
    </thead>
    <tbody>

      @foreach ($list as $row)
      @php
      $edit = route('products.edit',$row);
      $road = $row->category->road();
      $root = (count($road) == 1 ) ? $road[0] : end($road);
      @endphp

      @push('outer')
      <x-modal.delete :row="$row" action="products.destroy" />
      @endpush
      <tr>
        <td>
          <button data-toggle="modal" data-target="#modal-delete-{{$row->id}}" class="btn btn-sm btn-icon btn-danger"><i class="ft ft-x"></i></button>
        </td>
        <td>

          <button onclick="modal_src('modal-src','{{ $edit}}')" class="btn btn-sm btn-icon btn-primary"><i class="ft ft-edit"></i></button>
        </td>
        <td>
          <div class="font-medium-1 text-bold-600">
            {{$row->name}}
          </div>
          <div>
            {{Theme::title('at')}} : {{$row->created_at}}
          </div>
        </td>
        <td>
          <span class="tag tag-pill tag-info">
              {{ $root->name ?? '' }} : : 
          </span>
          <span class="font-medium-1">
           {{$row->category->name}}
          </span>
        </td>



        <td>{{$row->status}}</td>
        <td class="font-medium-1 text-bold-600">
          <span class="float-xs-right">
            {{number_format($row->price)}}đ
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