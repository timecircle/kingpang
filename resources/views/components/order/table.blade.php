@props([
'query',
'total' => 12,
])

@php
$list = $query->paginate($total);

@endphp

<div class="mb-2">



</div>

<div id="table" class="table-responsive">

  <table class="table">
    <thead>
      <th style="width:1rem">

      </th>
      <th style="width:1rem">

      </th>

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
      @php
      $service = $row->item->product;
      @endphp
      @push('outer')
      <x-modal id="modal-deny-{{$row->id}}">
        <div class="modal-content">
          <x-form action="{{ route('orders.update',$row) }}" method="PUT">

            
            <div class="modal-header">
              <h4 class="pull-left" id="myModalLabel2"><i class="fa fa-road2"></i>#{{ $row->name }}</h4>

              <div class="pull-right">
                <button type="submit" class="btn btn-primary">{{Theme::title('deny')}}</button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label> {{Str::title(__('declined reason')) }}</label>
                <textarea class="form-control" placeholder="{{Str::title(__('declined reason')) }}">{{old('declined_reason')}}</textarea>


              </div>
            </div>
          
          </x-form>
        </div>
      </x-modal>


      <x-modal id="modal-accept-{{$row->id}}">
        <div class="modal-content">
          <x-form action="{{ route('orders.update',$row) }}" method="post">

            <div class="modal-header">
              <h4 class="pull-left" id="myModalLabel2"><i class="fa fa-road2"></i>#{{ $row->name }}</h4>

              <div class="pull-right">
                <button type="submit" class="btn btn-primary">{{Theme::title('accept')}}</button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label> {{Str::title(__('Accept ')) }}</label>

              </div>
            </div>
          
          </x-form>
        </div>
      </x-modal>
      @endpush
      <tr>
        <th>
          <button data-toggle="modal" data-target="#modal-deny-{{$row->id}}" class="btn btn-sm  btn-danger"><i class="ft ft-x"></i> {{__('deny')}} </button>
        </th>
        <th>
          <button data-toggle="modal" data-target="#modal-accept-{{$row->id}}" class="btn btn-sm btn-primary"><i class="ftft-zap"></i> {{__('accept')}} </button>
        </th>

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

      @endforeach
    </tbody>


  </table>

  <div class="pull-right">
    {{$list->render('vendor.pagination.simple')}}

  </div>
</div>