@section('title')
<h1 class="content-title">
      {{ Theme::title($Post->name)  }}
    </h1>
@endsection
@section('content')

  <div class="card-block text-justify">
    {!! $Post->content !!}
  </div>
@endsection
<x-layout.master />
