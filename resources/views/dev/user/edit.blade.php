@section('title')
<div class="content-header-title mb-2">
  <h2>
    {{ Theme::title('info') }}
  </h2>
</div>
@endsection
@section('content')
<div class="content-body">
  <x-user.loginas :user="$user" />
</div>
@endsection

<x-layout.auth :user="$user" />