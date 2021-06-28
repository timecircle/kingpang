@section('title')
<div class="content-header-left col-md-6 col-xs-12 mb-1">
  <h3 class="content-header-title">
    {{ Theme::title("block") }}

  </h3>
</div>
@endsection
@section('content')

<div class="content-body">
  <div class="card">
    <div class="card-block">
      <x-block.table :query="$query" prefix="{{$prefix}}" />
    </div>
  </div>
</div>
@endsection

<x-layout.back />