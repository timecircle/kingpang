<div class="bg-white pt-6">
  
<div class="card">
  <div class="card-body">
    <div class="row text-xs-center">
        @if($item->avatar)
          <img src="{{ url($item->avatar->src)  }}" loading="lazy"
          class="card-img-top brand-lg" >
        @endif
        <h4>{{ $item->name }}</h4>
        <p>{{ $item->description }}</p>
    </div>

    <div class="card-block">
 
      @foreach( $item->childs()->get() as $item)
          @include('app.search.rowCate')
      @endforeach
    </div>
  </div>
</div>
</div>

<div class="app-w card ontop fixed yt-0">

      <div class="card-header">

            <div class="pull-left" data-dismiss="modal">
                <i class="ft-arrow-left  primary font-medium-4"></i>
            </div>

            <div class="pull-right" data-dismiss="modal" data-toggle="modal" data-target="#show-results">
                <i class="ft-search  primary font-medium-4"></i>
            </div>
      </div>
  </div>