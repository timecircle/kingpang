<div class="bg-white pt-6">
  <div class="app-width card line-bot ontop fixed yt-0">

      <div class="card-header">

      </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row text-xs-center">
          @if($item->avatar)
            <img src="{{ url($item->avatar->src)  }}" loading="lazy"
            class="card-img-top img-fluid" >
          @endif

      </div>

      <div class="card-block">
        @foreach( $item->childs()->get() as $item)
            @include('app.search.rowCate')
        @endforeach
      </div>
    </div>
  </div>
</div>
