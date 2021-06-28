@section('title')
<div class="content-header-title mb-2">
  <h2>
    {{ Theme::title('messenger') }}
  </h2>
</div>
@endsection
@section('content')

@endsection

<x-layout.auth :user="$user" />