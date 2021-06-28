@php
$pack = $product->pack;
$description = $product->description;
$name = $product->name;
$price = $product->price;
$delivery = $product->delivery * $this->quantity;
$revision = $product->revision;
$subtotal = $price * $quantity;
$fee = 0;
$total = $subtotal + $fee;

@endphp

<div class="card order-review">
  <x-form action="{{ route('app.cart.quick',$product) }}">
    <input type="hidden" value="{{$token}}" name="app_token" />
    <div class="content-wrapper">
      <div class="content-header">
        <h4>{{Theme::title('order details')}}</h4>
      </div>
      <div class="content-body  p-1">
        <div class="row">
          <div class="col-xs-8">
            <h6> {{Theme::title($pack)}} </h6>
            <p>
              {!! $description !!}
            </p>
          </div>
          <div class="col-xs-4">
            <label>
              {{ number_format($price).'đ' }}</label>

            <div class="input-group">
              <span class="input-group-addon"> X </span>
              <input type="number" name="quantity" wire:change="cal" wire:model="quantity" class="form-control" value="{{ $quantity }}" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrapper ">
      <div class="content-header">
        <h4>{{Theme::title('order sumary')}}</h4>
      </div>
      <div class="content-body p-1">
        <div class="row">
          <div class="col-xs-8">

            <p>
              {{Theme::title('sub total')}}
            </p>
          </div>
          <div class="col-xs-4">
            <label>
              {{ number_format($price * $quantity).'đ' }} </label>
          </div>
        </div>
      </div>
      <div class="content-footer p-1 line-top">
        <div class="row">
          <div class="col-xs-8">

            <p class="text-bold-600">
              {{Theme::title('total')}}
            </p>
          </div>
          <div class="col-xs-4">
            <label class="text-bold-700 primary">
              {{ number_format($subtotal + $fee).'đ' }} </label>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-8">

            <p class="text-bold-600">
              {{Theme::title('delivery')}}
            </p>
          </div>
          <div class="col-xs-4">
            <label class="text-bold-700 primary">
              {{ $quantity * $delivery }} {{ __('days')}}</label>
          </div>
        </div>
      </div>
    </div>

    <div class="content-wrapper ">
      <div class="content-header">
        <h4>
          <i class="fa fa-road2"></i>{{Theme::title('payment method')}}
        </h4>
      </div>
      <div class="content-body p-1">
        <label>
          <input type="checkbox" value="banking" checked />

          {{Theme::title('bank transfer')}}
        </label>
      </div>

      <div class="content-wrapper ">
        <div class="p-1">
          <button type="submit" class="btn btn-primary pull-right"> {{Theme::title('payment')}} </button>
        </div>
      </div>
    </div>

  </x-form>
</div>