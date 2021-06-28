@section('content')

<div class="card">
  <div class="card-block">
    @include('dev.block.list',[
          'list' => $list,
          'cols' => ['type','title']
      ])
    </div>
</div>
@endsection

<x-layout.wiget  />