@section('title')
<div class="content-header-title mb-2">
  <h2>
    {{ Theme::title('notifies') }}
  </h2>
</div>
@endsection
@section('content')
<div class="content-body">
  <div class="card">
    <div class="card-block">

    </div>
  </div>
</div>  
@endsection

<x-layout.auth :user="$user" />