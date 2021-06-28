@section('content')
<div class="container">
  <x-block class="col-md-8 offset-md-2">
    <div class="card box">
      <div class="card-header">
        <h2>{{ Theme::title(' requirement') }}</h2>

      </div>

      <div class="card-block">
        <div class="row">
            <div class="col-md-4">
              @if($product->avatar)
                <img loading="lazy" class="img-fluid" src="{{ url($product->avatar->src) }}" />
              @endif
            </div>
            <div class="col-md-8">
              <h4 class="text-justify text-bold-400" >
                {{  $product->name }}
              </h4>
              <div class="row mb-1">
                <div class="col-xs-6">
                  <span class="font-medium-2 primary text-bold-600" >
                     {{ Theme::title($product->pack) }}
                   </span>
                </div>
                <div class="col-xs-6">
                  <span class="font-medium-1 text-bold-600  float-xs-right" >
                    <i class="icon-calendar"></i>
                     {{Theme::title('delivery')}} :
                     {{ $product->delivery }} {{ __('days')}}
                   </span>
                </div>
              </div>
              <div class="box">
                <div class="p-1 font-medium-1 text-justify">
                  {!! $product->description !!}
                </div>
                </div>
            </div>
        </div>
          <div class="card-text">
            <blockquote class="blockquote border-left-red border-left-3 mt-1">
              <p class="mb-1">
                {!!  ('The start time is calculated when
                  <span class="text-bold-600">
                    Freelancer confirms and receives all the requirements
                  </span>') !!}
              </p>
              <p class="mb-0">
                {{__('Please describe your request in detail') }}
              </p>

            </blockquote>
          </div>
          <div class="card-body">
            <x-form class="form form-horizontal" action="{{ route('auth.order.request',$order) }}" method="PUT"  >
              <div class="form-body">

                <div class="form-group">
                  <textarea
                  rows="5"
                  class="form-control"
                  name="requirement"
                  placeholder="{{ Theme::title('request description')  }}"></textarea>
                </div>
              </div>
              <div class="form-actions right">
                  <x-button.attach class="font-medium-3 mr-1" />
                  <button name="act" value="requirement" class="btn btn-primary" type="submit">
                    {{ Theme::title('submit') }} </button>
              </div>
            </x-form>

          </div>
      </div>
    </div>
  </x-block>
</div>
@endsection

<x-layout.pay />
