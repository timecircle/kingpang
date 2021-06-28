@php 
  $posts =  $query->paginate();
@endphp
@section('content')

<div class="container">
  <x-block class="content-header ">
    <h1 class="display-4">
      {{ Theme::title($category->name)  }}
    </h1>
  </x-block>
  <x-block class="content-body ">
        @foreach($posts->chunk(3) as $chunk)
          <div class="row match-height mb-2">
              @foreach( $chunk as $post)
                  <div class="col-md-4 col-sm-6">
                    @include('page.post.inc.item')
                  </div>

              @endforeach
          </div>
        @endforeach
    </x-block>
    <x-block class="row" >
      <div class="float-xs-right">
        {{ $posts->render() }}
      </div>
    </x-block>

</div>
@endsection
<x-layout.post :category="$category" />
