@extends('page.ext.master')
@section('content')
<div class="container">
    <h3 class="content-header">Hoàn tất đơn hàng</h3>
    <div class="row mt-2 text-xs-center">

      <h4> Cám ơn bạn đã đặt lịch qua chúng tôi! </h4>
      <p>
          KingPang sẽ liên lạc với bạn sớm nhất.
          Hãy thường xuyên theo dõi tình trạng đơn hàng của bạn
      </p>
    </div>

    <div class="row  mt-2">
      <div class="col-md-4" >
        <div class="card">
          <div class="card-header" >
              <h4 class="card-title">
                Mã đơn : #{{ $order->name }}
              </h4>
              <div class="mb-1 font-medium-2 text-bold-400" >
                Lúc :  {{ date('d-m-Y  h:m:s', strtotime($order->created_at))}}
              </div>
          </div>

          <div class="card-block">


            <div class="row mb-1 font-medium-2 text-bold-600" >
                <label class="col-xs-8">
                    Tình trạng đơn hàng :
                </label>
                <span>
                  {{ __("$order->state") }}
                </span>
            </div>

            @if($order->discount)
                <div class="row mb-1 font-medium-2 text-bold-600" >
                    <label class="col-xs-8">
                      Giảm giá :
                    </label>
                    <span>
                      {{ $order->discount }}
                    </span>
                </div>
            @endif

            <div class="row mb-1 font-medium-2 text-bold-700" >
                <label class="col-xs-8">
                    Tổng giá trị :
                </label>
                <span>

                  {{number_format($order->total)}} đ
                </span>
            </div>

          </div>
        </div>
      </div>

        <div class="col-md-8">
          <div class="card">
            @foreach($order->items as $item)
              <div class="card-block">
                <div class="col-xs-2">
                  @if($item->product->avatar)
                    <img class="img-fluid" src="{{ url($item->product->avatar->src) }}" />
                  @endif
                </div>
                <div class="col-xs-10">
                  <h3 class="card-title">
                    {{ $item->product->name }}
                  </h3>
                  <label> Nhà cung cấp :
                    <a href="{{ url($item->product->freelancer->link->pretty) }}">
                      {{$item->product->freelancer->name}}
                    </a>
                  </label>

                  <div class="card-body">
                    <label> Giá bán :
                        <span class="font-medium-3 text-bold-600">
                          {{number_format($item->product->price)}} đ / 3 ngày làm việc
                      </span>
                    </label>
                  </div>

                </div>
                <div class="card-block table-responsive">
                  <table class="table">
                    <thead>
                      <th>Gói sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Ngày công</th>
                      <th>Thành tiền</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <h4 class="card-title">{{ $item->product->pack  }}
                          </h4>
                          <div class="card-text">
                              {!! $item->product->description !!}
                          </div>
                        </td>
                        <td>
                          {{ $item->quantity }}
                        </td>
                        <td>
                          <label class="font-medium-2 text-bold-600" >
                            3 ngày
                          </label>
                        </td>
                        <td>
                          <label class="font-medium-3 text-bold-600" >
                            {{ number_format($item->price).'đ' }}
                          </label>
                        </td>
                      </tr>
                    </tbody>

                  </table>
                </div>
            </div>
            @endforeach
          </div>
        </div>

    </div>
  </div>

@endsection
