@section('title')
<div class="content-header-title mb-2">
  <h2>
    {{ Theme::title('reward') }}
  </h2>
</div>
@endsection
@section('content')
<div class="content-body">
  <div class="card">
    <div class="card-block">

    </div>
  </div>

  <div class="card">

    <h2>{{Theme::title('note')}} : </h2>
    <blockquote class="border-left-amber border-left-3 mt-1">
      <ul>
        <li>
          Chỉ áp dụng 1 voucher cho 1 lần đặt hàng, không áp dụng đồng thời với các chương trình khuyến mãi khác
        </li>
        <li>
          Voucher chỉ sử dụng cho những đơn hàng có giá trị cao hơn
        </li>
        <li>
          Voucher có thể chỉ áp dụng cho một số dịch vụ nhất định, và có thể cần thỏa mãn các điều kiện về giá trị đơn hàng
        </li>
        <li>
          Voucher đã sử dụng không thể đổi sang voucher khác
        </li>
        <li>
          Voucher đã sử dụng trong đơn hàng bị hủy thì sẽ không được hoàn trả

        </li>
      </ul>
    </blockquote>
  </div>
</div>
@endsection

<x-layout.auth :user="$user" />