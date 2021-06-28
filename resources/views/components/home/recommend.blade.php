@php
$recommend = App\Models\Product::root()->inventory()->take(3)->orderByDesc('created_at')->get();
@endphp
<div class="container center-layout">
  <div class="content-header">
    <h2 class="text-bold-600">
      {{Theme::title('get inspired with projects made by our freelancers') }}
    </h2>
  </div>
  <div class="content-body pt-2">
    <div class="row match-height">
      @foreach($recommend as $product)

      @php
      $freelancer = $product->freelancer;
      $avatar = empty($freelancer->avatar)
      ? asset('theme/images/portrait/small/avatar-s-1.png')
      : url($freelancer->avatar->src);
      @endphp
      <div class="col-md-4 col-sm-6">
        <div class="card box">
          <a href="{{ url($product->link->pretty) }}">
            @isset($product->avatar)
            <div class="box-image lazy" data-bg-img='{{ $product->avatar->src }}'></div>
            @endisset
          </a>
          <div class="card-header">

            <img src="{{ $avatar }}" class="rounded-circle img-border x45 pull-left mr-2" />
            <div class="pull-left">
              <a href="#">
                <div class="text-bold-600">{{ $product->category->title }}</div>
              </a>

              <a href="{{ url($product->freelancer->link->pretty)  }}">
                <div> {{ __('by').' '.$product->freelancer->name   }}</div>
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>