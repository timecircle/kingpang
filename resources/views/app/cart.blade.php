@extends('app.inc.master')

@section('content')
<div class="bg-white">
  <div class="app-width card ontop line-bot fixed yt-0">
    <h4 class="card-header text-xs-center">
      <div class="pull-left fonticon-wrap">
        <a  href="{{route('app.product',[$token,$product]) }}">
            <i class="ft-arrow-left  primary font-medium-4"></i>
          </a>
        </div>

        <span>{{Theme::title('order review')}}</span>
    </h4>
  </div>


  <div class="content-wrapper pt-4 ">
    <div class="p-2">
          <div class="col-xs-3">
            <div class="row">
              <img class="img-fluid" src="{{ url($cart->item->avatar->src) }}" />
            </div>
          </div>
          <div class="col-xs-9">
            <div class="font-medium-1 text-bold-600">
              {{  $cart->item->name }}
            </div>
          </div>

        </div>
    </div>
    <div class="p-2">
      <livewire:cart.app product="{{ $product}}" />
    </div>


  <div class="pt-6">
    <div class="app-width pb-1 fixed yb-0">
      <div class="form-group">
        <button data-toggle="modal" data-target="#order-pay"
        class="btn btn-primary round btn-block">{{Theme::title('payment') }}</button>
    </div>
    </div>
  </div>
</div>
@endsection

@push('outer')
<div class="modal fade" id="order-pay"
  tabindex="-1" role="dialog">
  <div class="app-content">
    @include('app.inc.order-pay')
  </div>
</div>
@endpush
