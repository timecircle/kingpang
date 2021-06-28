<div class="table-responsive">
  <table class="table">
    <thead>
      <th style="width:50rem">{{ __('pack name') }}</th>
      <th >{{ __('quantity') }}</th>
      <th style="width:20rem" >{{ __('delivery') }}</th>
      <th style="width:20rem">{{ __('total') }}</th>
    </thead>
    <tbody>
      <tr>
        <td>
          <h4 class="card-title">{{$cart->item->pack}}
          </h4>
          <div class="card-text">
              {!! $cart->item->description !!}
          </div>
        </td>
        <td>
      
          <input type="number" name="quantity" wire:change="cal"
          wire:model="quantity"
          class="form-control"
          value="{{ $quantity }}" />
        </td>
        <td>
          <label wire:model="delivery"   class="font-medium-2 text-bold-600" >
          {{ $quantity * $delivery }} {{ __('days')}}
          </label>
        </td>
        <td>
          <label class="font-medium-3 text-bold-600" >
            {{ number_format($price).'đ' }}
          </label>
        </td>
      </tr>
    </tbody>

  </table>
</div>
