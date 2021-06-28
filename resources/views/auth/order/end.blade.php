@section('content')
<div class="container">
  <x-block class="col-md-8 offset-md-2">
    <div class="card box">
      <div class="card-header">
        <h2>{{ Theme::title('thank you for your request') }}</h2>

      </div>

      <div class="card-block text-xs-center font-medium-2">
          <div class="mb-1">
              {{Theme::title('your request has been sent to Freelancer')}}


          </div>
          <div class="mb-1">
          {{Theme::title('our freelancer will respond to you soon') }}

          </div>
          
      </div>

      <div class="card-footer ">

        <a href="{{route('home')}}" class="btn btn-primary pull-right"> {{Theme::title('back to home page') }} </a>
      </div>
    </div>
  </x-block>
</div>
@endsection

<x-layout.pay />
