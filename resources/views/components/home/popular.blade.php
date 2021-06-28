@php

$popular = App\Models\Block::pull('home.popular','list')->orderByDesc('priority')->get();

@endphp

<div class="container">
  <div class="content-header">
    <h2 class="text-bold-600">
      {{ Theme::title('popular professional services') }}
    </h2>
  </div>
  <div class="content-body pt-2">
    <div class="row match-height">
      @foreach($popular as $item)
      <div class="col-md-3 ">
        <div @if($item->avatar)
          data-bg-img="{{ url($item->avatar->src) }}"
          @endif
          class="lazy card popular" >

          <div class="content m-2">
            <a href="{{ url($item->link) }}">
              <h2 class="card-title">{{$item->title}}</h2>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>