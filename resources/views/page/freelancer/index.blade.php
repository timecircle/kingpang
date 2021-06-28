

@push('outer')
<x-modal.contact :freelancer="$freelancer" />
@endpush

@section('side')
<div class="card">
  <div class="card-block  text-xs-center box">
    <div class="media profil-cover-details">
      @if($freelancer->avatar)
      <img loading="lazy" class="rounded-circle img-border x100" src="{{ url($freelancer->avatar->src) }}" />
      @endif
      <h3 class="card-title mt-1" />
      {{ $freelancer->name }}
      </h3>
    </div>
    <div class="block">
      <span class="font-medium-2 mr-1">
        <x-star />
      </span>

      <label class="text-bold-600 font-medium-2" />
      5.0 / 969 {{__('review')}}
      </label>
    </div>
    <x-button.contact id="{{$freelancer->id}}" class="btn btn-primary btn-block" out="{{ Theme::title('contact me') }}" />
  </div>
</div>

<div class="card">
  <div class="card-header row">
    <h4 id="intro" class="card-title">
      {{Theme::title('intro')}}
    </h4>
  </div>
  <div class="card-block box">
    {!!$freelancer->intro!!}
  </div>
</div>
@endsection
@section('content')
<div class="card">
  <div class="card-header row">
    <h4 id='service' class="card-title">
      {{Theme::title('service')}}
    </h4>
  </div>
  <div class="card-body">

    <x-product.list :query="$query" col='3' />
  </div>
</div>

<div class="card">
  <div class="card-header row">
    <h4 id='review' class="card-title">
      {{ Theme::title('review') }}"
    </h4>

    <span class="font-medium-2 mr-1">
      <x-star />
    </span>
  </div>

  <div class="card-block box">

    <div class="card-title">
      {{ __('no comment') }}
    </div>

  </div>

</div>
@endsection
<x-layout.master side="left" />