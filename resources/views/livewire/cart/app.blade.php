<div class="order-review">
  <div class="content-wrapper">
      <div class="content-header">
          <h4>{{Theme::title('order details')}}</h4>
      </div>
      <div class="content-body  p-1">
          <div class="row">
              <div class="col-xs-8">
                <h6> {{Theme::title($cart->item->pack)}} </h6>
                <p>
                    {!! $cart->item->description !!}
                </p>
              </div>
              <div class="col-xs-4">
                <label>
                  {{$cart->item->price_format}} </label>

                  <div class="input-group">
    								<span class="input-group-addon"> X </span>
                    <input type="number" name="quantity" wire:change="cal"
                    wire:model="quantity"
                    class="form-control input-sm"
                    value="{{ $quantity }}" />
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
              {{ number_format($price).'đ' }} </label>
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
              {{ number_format($price).'đ' }} </label>
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
</div>
