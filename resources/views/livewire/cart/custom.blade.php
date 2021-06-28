@php
  $pack            = $product->pack;
  $description     = $product->description;
  $name     = $product->name;
  $price    = $product->price;
  $delivery = $product->delivery * $this->quantity;
  $revision = $product->revision;
  $subtotal = $price * $quantity;
  $fee      = 0;
  $total    = $subtotal + $fee;

@endphp
<div class="content">
<x-form action="{{ route('auth.order.quick',$product) }}" method="POST" >
  <div class="col-md-7">
    <div class="row mb-2">
      <div class="col-xs-4">
        @isset($product->avatar)
          <img class="img-fluid" loading="lazy" src="{{$product->avatar->src}}" />
        @endisset
      </div>
      <div class="col-xs-5">
          <h4 class="mb-2 row"> {{$name}} </h4>
          <div class="row">
            <label  class="text-bold-600" >

              {{Theme::title('price')}}  :
             </label>
             {{$product->price_format }}
         </div>

          <div class="row">
            <label  class="text-bold-600" >

              {{Theme::title('delivery')}} :
             </label>
             {{ $delivery. __('days')}}
         </div>
         <div class="row">
           <label  class="text-bold-600" >
             {{Theme::title('revision')}} :
           </label>
            {{ __('times')}}
         </div>
      </div>
      <div class="col-xs-3">
        <fieldset>
  				<div class="input-group">
  					<span class="input-group-addon" id="basic-addon1">{{ __('qty') }}</span>
            <input type="number" name="quantity"
                wire:change="cal"
                wire:model="quantity"
                class="form-control"
                value="{{ $quantity }}" />
          </div>
  			</fieldset>
        <label class="font-medium-3 primary text-bold-600" >
          {{ number_format($subtotal) }}đ
        </label>
      </div>
      
    </div>
    <div class="card-content">
      {{$description }}
    </div>

  </div>
  <div class="col-md-5">
    <h2 class="text-bold-600">{{ Theme::title('sumary') }} </h2>
    <div class="card box">

      <div class="card-block">
        <div class="row mb-1">
          <label class="col-xs-6">{{Theme::title('subtotal')}} :</label>
          <div class="col-xs-6">
          <span class="font-medium-2 primary text-bold-600 float-xs-right" >
            {{ number_format($subtotal) }}đ
          </span>
        </div>
        </div>
        <div class="row">
          <label class="col-xs-6">{{Theme::title('service fee')}} :</label>
          <div class="col-xs-6 ">
          <span class="font-medium-2 primary text-bold-600  float-xs-right" >
            {{ $fee }}
          </span>
        </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row mb-1">
          <label class="col-xs-6  text-bold-600">{{Theme::title('Total')}} :</label>
          <div class="col-xs-6">
            <span class="font-medium-2 primary text-bold-600  float-xs-right" >
                {{ number_format($total) }}đ
            </span>
        </div>
        </div>
        <div class="row mb-1">
          <label class=" col-xs-6 text-bold-600" >
            <i class="icon-calendar"></i>
               {{Theme::title('delivery')}} :
           </label>
           <div class="col-xs-6 ">
             <span class="font-medium-2 text-bold-600  float-xs-right" >
              {{ $delivery }} {{ __('days')}}
            </span>
           </div>
        </div>
       
          <input type="hidden" name="total" value="{{ $total }}" />
          <button class="btn btn-primary btn-block" type='submit'>
            {{Theme::title('continue to checkout')}}
          </button>

      
      </div>


    </div>
  </div>
  </x-form>
</div>
