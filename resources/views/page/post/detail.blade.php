@section('content')
<div class="container">
  <x-block class="content-header ">
    <h1 class="display-4">
      {{ Theme::title($category->name)  }}
    </h1>
  </x-block>

  <x-block class="content-body box">

    <h2 class="card-header text-bold-400">
      {{ Theme::title($Post->name)  }}
    </h2>

    <div class="card-block text-justify">
      {!! $Post->content !!}
    </div>
  </x-block>
</div>
@endsection

<x-layout.post :category="$category" />
