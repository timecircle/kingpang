@section('content')
<div class="section pt-4">

  <div class="p-1">
    <p class="font-medium-2">
      {{__('We got your order code')}} :
      <span class="primary text-bold-600">
        #{{ $order->name }}
      </span>
    </p>
    <p class="font-medium-2">
      {{Theme::title('at')}} :
      <span class="text-bold-400">
        {{ date('d-m-Y  h:m:s', strtotime($order->created_at))}}
      </span>
    </p>
    <p class="font-medium-2 text-bold-600">

      {{Theme::title('state')}} :

      <span>
        {{ __("$order->state") }}
      </span>

    </p>
  </div>
  <div class="p-1">

    <p>
      Technological And Commercial Joint- Stock Bank - Techcombank </p>
    <p class="text-bold-600"> Swift code: VTCBVNVX</p>

    <p> CÔNG TY TNHH MTV LATH GROUP LATH GROUP COMPANY LIMITED </p>
    <p> Number Account :<span class="text-bold-600"> 19036801918021 (VNĐ) </span> </p>
    <p>Please use the content below. KingPang confirms payment with this content</p>
    <input type="text" disabled="" class="bg-white text-bold-600 font-medium-4 form-control text-xs-center" value="PAY{{$order->id}}">
  </div>

  <div class="p-1">
    <h4>
      {{ __("  We will confirm the payment ( 3 working days) ") }}
    </h4>
  </div>

  <div class="p-1">
    <button type="button" onclick="parent.md_hide('#modal-src')" class="btn btn-primary btn-block round">
      {{Theme::title('Thank you for your payment')}}
    </button>
  </div>
</div>

<x-block class="app-w card p-1 line-bot fixed yt-0 text-xs-center">

  <h4 class="text-bold-600 text-xs-center">

    <label class=" pull-left" onclick="parent.md_hide('#modal-src')">
      <i class="ft-arrow-left  pull-left  primary font-medium-4"></i>
    </label>
    {{ Theme::title('payment') }}
  </h4>
</x-block>
@endsection
<x-layout.mobile />