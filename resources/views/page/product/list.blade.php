
@section('title')
<h1 class="content-header-title">
    {{ $category->name }}
  </h1>
  <p class="font-medium-2">{{$category->description}} </p>
@endsection
@section('side')
<x-menu.categories :category="$category" />
@endsection
@section('content')
<x-product.filter />
<x-product.list col="3" :query="$query" />

@endsection
<x-layout.master side='left' />