
@section('content')
<x-block class="card h-100 text-xs-center">

  <div class="card-header">

  </div>

  <div class="card-body">
    <div class="card-block">
      <img src="{{asset('theme/images/app/welcome.png')}}" loading="lazy" class="img-fluid" />
    </div>
    <div class="card-text">
      <h1 class="primary mb-2">
        {{ __('A global talent network for hire') }}
      </h1>
      <div class="font-medium-2">
        {{__("Find professionals and agencies for any project")}}
      </div>
    </div>
  </div>

  

</x-block>
<x-block class="app-w text-xs-center fixed yb-0">
    <div class="card-block text-xs-center">
      <div class="form-group">
        <button type="button" data-toggle="modal" data-target="#modal-login" class="btn btn-primary btn-block round "> {{Theme::title(__('login'))}}</button>
      </div>
      <div class="form-group">
        <a href="{{ route('app.main',$token ) }}" class="btn btn-secondary btn-block round "> {{ Theme::title(__('skip')) }}</a>
      </div>
    </div>
  </x-block>
@endsection

<x-layout.mobile />