@extends('page.ext.master')
@php
    $product    = $cart->item;
    $freelancer = $product->freelancer;
@endphp
@section('content')
<div class="container">
  <div class="content-header mb-2">
      <x-item tag="h1" class="display-4" out="{{Theme::title('customize your package')}}" />
    </div>
    <div class="content-body">
      <div style="z-index:9" class="col-md-8">

        <div class="card-block box">
            <div class="row">

            <div class="col-xs-3">
              <x-item tag="media" class="img-fluid" out="{{ url($cart->item->avatar->src) }}"  />

            </div>
            <div class="col-xs-9">

              <x-item tag="h3" class="card-title" out="{{  $cart->item->name }}" />
                <a href="{{ url($freelancer->link->pretty) }}">
                  <x-item tag="label" out="{{$cart->item->freelancer->name}}" />
                </a>
              <label> Nhà cung cấp :

              </label>

              <div class="card-body">
                <label> Giá bán :
                    <span class="font-medium-3 text-bold-600">
                      {{ $cart->item->price_format }}  / {{ $cart->item->delivery_format}}
                  </span>
                </label>
              </div>


            </div>
          </div>
          <livewire:cart.show product="{{ $product}}" />
        </div>
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">
              Khuyến mại :
            </h3>
            <label class="col-xs-3 mt-1"> Phiếu giảm giá :</label>
            <div class="col-xs-6">
            <select id="discount" class="form-control">
                <option>
                    --- Chọn ---
                </option>
            </select>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h3 class="card-title">
              Phương thức thanh toán :
            </h3>
            <div class="card-text">

              <p>
                <label> Chuyển khoản qua ngân hàng  :</label> Ngân hàng TMCP Kỹ thương Việt Nam (Techcombank).
              </p>
              <p>Swift code:<span class="font-medium-2 text-bold-600"> VTCBVNVX </span></p>
              <h4 class="font-medium-2 text-bold-600">
                CÔNG TY TNHH MTV LATH GROUP
LATH GROUP COMPANY LIMITED
</h4>
              <p>

                <label> Số Tài Khoản :</label>

                <span class="font-medium-2 text-bold-600">19036801918021 (VNĐ) </span>
              </p>
            </div>
          </div>
        </div>
        <div class="card">

          <div class="card-header">


          <h3 class="card-title">

            <label>
                <input type="checkbox" id="has_invoice" onclick="invoice()" name="has_invoice"  value="1">
                  Xuất hóa đơn
            </label>

          </h3>
      </div>
      <div class="card-block">
      <div class="card-text">
        <ul>
          <li>
            "Hóa đơn thuế" do freelancer phát hành,
              không phải "phiếu xác nhận thanh toán" do KINGPANG cung cấp
          </li>
          <li>
            Nếu quý khách không điền đủ thông tin, hóa dơn sẽ được xuất theo thông tin mua hàng
          </li>
        </ul>

      </div>

        <div class="card-body collapse" >

            <div class="col-md-8  offset-md-2">

                <div class="row">

                  <div class="col-xs-4">
                      <label>{{ Str::title(__('company name')) }} : </label>
                  </div>
                  <div class="col-xs-8">
                    <input name="invoice_name" class="form-control"  />
                  </div>

                </div>

                <div class="row mt-1">
                  <div class="col-xs-4">
                      <label>{{ Str::title(__('tax code')) }} :  </label>
                  </div>
                  <div class="col-xs-8">
                    <input name="invoice_tax" class="form-control"  />
                  </div>
                </div>

                <div class="row mt-1">
                  <div class="col-xs-4">
                      <label> {{ Str::title(__('tel')) }} :  </label>
                  </div>
                  <div class="col-xs-8">
                    <input name="invoice_phone" class="form-control"  />
                  </div>
                </div>
                <div class="row mt-1">
                  <div class="col-xs-4">
                      <label>{{ Str::title(__('address')) }}:  </label>
                  </div>
                  <div class="col-xs-8">
                      <input name="invoice_address" class="form-control"  />
                  </div>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div id="sidebar" class="container  fixed">
              <div class="offset-xs-8 col-md-4" >
                <div class="card item-prod">

                  <div class="card-block">
                    <div class="card-body">
                        <div class="row mb-1 font-medium-2 text-bold-400 " >
                            <label class="col-xs-6">
                                Tạm tính :
                            </label>
                            <span class="col-xs-6">
                              {{ number_format($price).' đ' }}
                            </span>
                        </div>
                        @if($discount)
                        <div class="row mb-1 font-medium-2 text-bold-400" >
                            <label class="col-xs-6">
                                Giảm giá :
                            </label>
                            <span class="pull-right">
                              {{ $discount }}
                            </span>
                        </div>
                        @endif
                        </div>
                    </div>

                  <div class="card-footer ">
                      <form method="post" action='{{ route('cart.pay',$cart->product_id) }}'>
                      <div class="row font-medium-3 mb-2 text-bold-700">
                        <input type="hidden" name="freelancer_id"  value="{{$freelancer->id}}">
                            @csrf
                          <label class="col-xs-6">
                              Thành tiền :
                          </label>
                          <span >
                            {{ number_format($total).' đ' }}
                        </span>
                      </div>


                        <label class="text-justify">
                            <input type="checkbox" required value="1">
                            <span >
                              Tôi xác nhận chi tiết đơn hàng và đồng ý với việc thanh toán
                              <span>
                        </label>

                          @if(Auth::check())

                              <button type="submit" class="btn btn-primary btn-block">
                                Tiến hành thanh toán
                              </button>
                          @else
                              <button type="button" data-toggle="modal" data-target="#modal-login"
                                class="btn btn-primary btn-block">
                                Tiến hành thanh toán
                              </button>
                          @endif

                      </form>
                    </div>

                </div>
              </div>
      </div>

    </div>

  </div>

@endsection

@push('script')

  <script>
      function invoice(){
          $(".collapse").collapse('toggle')
      }


    $(window).scroll(function() {
        if (window.pageYOffset > (footer-480)) {
          sidebar.classList.remove("fixed");
          sidebar.classList.add("none");
        } else {
          sidebar.classList.add("fixed");
          sidebar.classList.remove("none");
        }
    });

  </script>
@endpush
