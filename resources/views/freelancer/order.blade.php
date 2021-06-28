@extends('freelancer.master.index')
@section('title')
<h4>{{ Str::title(__("orders")) }}</h4>
@endsection
@php
$cols = ['code','service','status'];

@endphp
@section('content')
<div class="card">
  <div class="card-block">

  <div id="table" class="table-responsive">
    <table class="table">
      <thead>

        <th style="width:10rem"></th>
        <th style="width:15rem">{{ Str::title('code')  }}</th>
        <th>{{ Str::title('service')  }}</th>
        <th style="width:5rem">{{ Str::title('status')  }}</th>

      </thead>

      <tbody>

        @foreach ($list as $row)

          <tr>
            <th>
              <div class="form-group">
                <button data-toggle="modal" data-target="#modal-deny-{{$row->id}}"
                class="btn btn-sm  btn-danger"><i class="ft ft-x"></i> {{__('deny')}} </button>

                <button data-toggle="modal" data-target="#modal-accept-{{$row->id}}"
                  class="btn btn-sm btn-primary"><i class="ftft-zap"></i> {{__('accept')}} </button>


            </div>
            </th>
            @foreach ($cols as $col)
              <td>
                  @switch($col)

                      @case('code')
                          <label class="card-title"> #{{$row->name}}
                          </label>
                          <p class="red"> {{$row->created_at}}</p>

                        @break

                      @case('total')
                          <div class="row"> {{$row->created_at}}</div>
                          <div class="row">
                            {{'customer code'}}:
                            <span class="">
                              #{{ $row->user->customerOf($row->freelancer_id)->code }}
                            </span>
                          </div>

                            <div class="row">
                            {{'total'}}: <span class="font-medium-2 red"> {{ number_format($row->total) }} đ </span>
                          </div>
                        @break
                      @case('service')
                            <div class="row">
                              <span class="font-medium-2">
                               {{$row->item->product->name}}
                             </span>
                            </div>

                            <div class="form-group row ">
                                <span class="tag tag tag-pill tag-success mr-2">{{ $row->item->product->pack }}</span>
                                <span class="font-medium-1">{{$row->item->quantity}} </span>  X
                                <span class="font-medium-1">{{ number_format($row->item->product->price) }} đ </span>

                            </div>
                            <div class="row">
                            {{'total'}}: <span class="font-medium-2 red"> {{ number_format($row->total) }} đ </span>
                          </div>
                        @break
                        @case('status')
                            <span class="tag tag tag-pill tag-info font-medium-1">{{ __($row->state) }}</span>
                        @break
                      @default
                          {{$row->$col}}
                  @endswitch

              </td>
            @endforeach


          </tr>
          @push('outer')

              <div class="modal fade" id="modal-deny-{{$row->id}}"
                tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form  action="{{ route('orders.update',$row) }}"
                        method="post">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> #{{ $row->name }}</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                                <label> {{Str::title(__('declined reason')) }}</label>
                                <textarea   class="form-control"

                                placeholder="{{Str::title(__('declined reason')) }}">{{old('declined_reason')}}</textarea>


                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button"
                                class="btn grey btn-outline-secondary"
                                data-dismiss="modal">Close</button>
                              <button type="submit"
                                name="act" value="declined"
                                class="btn btn-outline-primary">{{__('Deny')}}</button>
                           </div>
                           @method('PUT')
                           @csrf
                       </form>
                    </div>
                </div>
              </div>


              <div class="modal fade" id="modal-accept-{{$row->id}}"
                tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form  action="{{ route('orders.update',$row) }}"
                        method="post">
                          <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> #{{ $row->name }}</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                                <label> {{Str::title(__('Accept ')) }}</label>

                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button"
                                class="btn grey btn-outline-secondary"
                                data-dismiss="modal">Close</button>
                              <button type="submit"
                                name="act" value="accept"
                                class="btn btn-outline-primary">{{__('Accept')}}</button>
                           </div>
                           @method('PUT')
                           @csrf
                       </form>
                    </div>
                </div>
              </div>

            @endpush
        @endforeach
      </tbody>

    </table>

    <div class="pull-right">
      {{$list->render()}}

    </div>
  </div>

  </div>
</div>
@endsection
