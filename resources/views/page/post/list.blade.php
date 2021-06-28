@section('content')

<div class="container">
  <div class="content-header ">
    <h1 class="display-4">
      {{ Theme::title($category->name)  }}
    </h1>
  </div>
  <x-post.list :query="$query" />

</div>
@endsection
<x-layout.post :category="$category" />