@php
$review = App\Models\Block::pull('home.review')->orderByDesc('priority')->first();

@endphp
<div class="container">
  <div class="row">
    <div class="col-md-6">
      @if($review->avatar)
      <img src="{{ url($review->avatar->src) }}" loading="lazy" class="img-fluid" />
      @endif
    </div>

    <div class="col-md-6">
      <div class="card-block">
        <h2>{{ $review->title }}</h2>
        <div>{!! $review->content !!}</div>
      </div>
    </div>
  </div>
</div>