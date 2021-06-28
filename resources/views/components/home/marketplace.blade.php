@php 
$list = App\Models\Category::root()->wherePrefix('service')->orderByDesc('priority')->get();
@endphp

<div class="container">
  <div class="content-header">
    <h2 class="text-bold-600"> {{Theme::title('explore the marketplace') }}</h2>
  </div>
  <div class="content-body pt-2">
    @foreach( $list->chunk(4) as $chunk)
      <div class="row match-height mb-2">
        @foreach($chunk as $item)
          <div class="col-md-3 text-xs-center">
            <div class="card">
                <a href="{{ url($item->link->pretty)  }}" class="nav-link">
                  @isset($item->avatar)
                    <img src="{{ url($item->avatar->src) }}" class="icon" loading="lazy" />
                  @endisset
                  <h4>{{ $item->name }}</h4>
                </a>
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
</div>
