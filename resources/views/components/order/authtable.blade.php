@props([
'query',
'total' => 12,
])

@php
$list = $query->paginate($total);

@endphp

<div class="mb-2">
  <x-form name="search" action="{{route('search.find','client.order')}}">
    <div class="col-xs-4">
      <div class="form-group">

        <input type="text" name="product_name" placeholder="{{__('search name')}}" class="form-control">

      </div>
    </div>


    <div class="col-xs-3">
      <div class="form-group">

        <div class="input-group">
          <input type="text" placeholder="{{__('date to date')}}" class="form-control showdropdowns">
          <span class="input-group-addon">
            <span class="fa fa-calendar"></span>
          </span>
        </div>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <select name="status" class="form-control">
          @foreach(config('dev.order_status') as $sta)
          <option value="{{$sta}}">
            {{__($sta)}}
          </option>

          @endforeach

        </select>
      </div>
    </div>


    <div class="col-xs-2">
      <button class="btn btn-block btn-primary"> {{ __('Search') }}</button>
    </div>
  </x-form>
</div>

<div id="table" class="table-responsive">

  <table class="table">
    <thead>

      <th style="width:8rem">
        {{ Theme::title('code') }}
      </th>
      <th style="width:26rem">
        {{ Theme::title('service') }}
      </th>

      <th style="width:8rem">
        {{ Theme::title('price') }}
      </th>
      <th>
        {{ Theme::title('qty') }}
      </th>
      <th>
        <span class="pull-right">

        </span>
      </th>
      <th style="width:2rem">



      </th>

    </thead>
    <tbody>

      @foreach ($list as $row)
      @if(isset($row->item))
      @php

      $service = $row->item->product;
    
      @endphp
      
      <tr>


        <td>
          <div class="font-medium-1 text-bold-600">{{ $row->code }}</div>
          <div>{{Theme::title('at') }}: {{$row->created_at}}</div>
        </td>

        <td>

          <span class="tag tag tag-pill tag-info"> {{ $service->pack }}</span>
          <div class="font-medium-1 text-bold-600"> {{$service->name}}</div>
        </td>

        <td style="width:4rem">
          <div class="font-medium-1 text-bold-600">
            {{ $service->price_format }}
          </div>
        </td>
        <td class="font-medium-1 text-bold-600">
          x {{ $row->item->quantity }}
        </td>
        <td>
          <div class="font-medium-1 text-bold-600 pull-right"> {{ number_format($row->total) }} đ </div>
        </td>
        <td>
          <span class="tag tag tag-pill tag-info ">{{ __($row->state) }}</span>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>


  </table>

  <div class="pull-right">
    {{$list->render('vendor.pagination.simple')}}

  </div>
</div>