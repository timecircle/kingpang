@section('title')
<div class="content-header-title mb-2">
  <h2>
    {{ Theme::title('order') }}
  </h2>
</div>
@endsection

@section('content')

<div class="content-body">
  <div class="card">
    <div class="card-block">
      <x-order.authtable :query="$query" />
    </div>
  </div>

  <div class="card">

    <h2>{{Theme::title('note')}} : </h2>
    <blockquote class="border-left-amber border-left-3 mt-1">
      <ul>
        <li>
          Hóa đơn thuế do trực tiếp Freelancer cung cấp dịch vụ phát hành.
        </li>
        <li>
          Có thể yêu cầu nhận hóa đơn thuế từ những Freelancer là doanh nghiệp đã có giấy phép kinh doanh
        </li>
        <li>
          Các khoản giảm giá được khấu trừ không thể xuất hóa đơn thuế
        </li>
        <li>
          Phiếu xác nhận thanh toán phát hành nhằm mục đích chứng minh giao dịch hoàn tất, không có giá trị khi quyết toán thuế nhà nước
        </li>
      </ul>
    </blockquote>
  </div>
</div>
@endsection

<x-layout.auth :user="$user" />