@props([
'query',
'total' => 12,
])

@php
$list = $query->paginate($total);

@endphp

<div class="mb-2">
  <x-product.search />
</div>
<div id="table" class="table-responsive">
  <table class="table">
    <thead>
     
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
       
      </th>
    </thead>
    <tbody>

      @foreach ($list as $row)
      @php
      $edit = route('products.edit',$row);
      $road = $row->category->road();
      $root = (count($road) == 1 ) ? $road[0] : end($road);
      @endphp

     
      <tr>
       
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