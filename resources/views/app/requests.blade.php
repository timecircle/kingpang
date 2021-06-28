@section('content')


<x-block class="section pt-4">
  
<div class="card-header app-w">
  @if($category)
  <span style="padding: .5rem;" class="font-medium-1 round bg-primary float-xs-left mr-2">
  {{ $category->name }}</span>
  @else 

    <h4 class="card-title">{{ Theme::title('recommended service') }}</h4>
  
  @endif
  </div>

  <div class="p-2">
    <x-app.service.list :services="$recommendService" token="{{$token}}" />
  </div>


</x-block>

<x-block class="app-w line-bot card fixed  yt-0 text-xs-center">
  <div class="p-1">

    <div class="col-xs-9">
      <fieldset class="form-group row position-relative has-icon-left">
        <input type="text" name="search" autofocus placeholder="{{ Theme::title('what are you looking for?') }}" class="form-control round">
        <div class="form-control-position">
          <i class="ft-search  primary font-medium-4"></i>
        </div>
      </fieldset>
    </div>
    <div class="col-xs-3">
      <div class="row  float-xs-right">
        <button onclick="parent.md_hide('#modal-src')" class="btn btn-block round" type="button">{{Theme::title('cancel')}}</button>
      </div>
    </div>

  </div>
</x-block>
@endsection

<x-layout.mobile />