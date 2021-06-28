<form class="form"
@if(isset($data))
    enctype="multipart/form-data"
@endif
action="{{$action}}" method="post">
  @csrf
    @if(isset($method))
        @method($method)
    @endif
  @yield('form')
  <div class="form-actions clearfix">

    <div class="buttons-group float-xs-right">
		     <button type="submit" class="btn btn-primary mr-1">{{__('Save')}}</button>
	   </div>
  </div>

</form>
