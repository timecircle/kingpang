@php
  $bank  =  'technological and commercial joint- stock bank - techcombank';
  $acc   =  'CÔNG TY TNHH MTV LATH GROUP LATH GROUP COMPANY LIMITED';
  $num   =  '19036801918021 (VNĐ)';
  $swift =  'VTCBVNVX';
@endphp
<div class="card box">
  <h2 class="card-header">
    {{ Theme::title('payment options') }}
  </h2>

  <div class="card-body">
    <div class="card-block">
      <div class="font-medium-2 ">
         {{ Theme::title('transfer') }} :

        {{ Theme::title($bank) }}
      </div>
      <div>
        Swift code:<span class="font-medium-2 text-bold-600"> {{ $swift }}</span>
      </div>
    </div>

    <div class="card-block">
      <h4 class="font-medium-2 text-bold-600">
        {{ $acc }}
      </h4>
      <div>

        <label> {{ Theme::title('number account') }} :</label>

        <span class="font-medium-2  text-bold-600">{{ $num }} </span>
      </div>
    </div>
    <div class="card-footer">
      <label class="font-medium-3">
        {{ __('Please use the content below. KingPang confirms payment with this content') }}
      </label>
      <input type="text" disabled
      class="bg-white form-control text-xs-center font-large-1 primary"
      value="PAY{{$order->id}}" />

    </div>
  </div>
</div>
