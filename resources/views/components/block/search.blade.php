@php
$search = (new App\Classes\Search('block'))->get();
$code = empty($search->code) ? '' : $search->code;
$title = empty($search->title) ? '': $search->title;

@endphp

<x-form class="form" action="{{route('search.find','block')}}">
  <div class="row">
  
    
    <div class="col-md-3">
      <label class="text-bold-600">{{Theme::title('code')}}: </label>
      <input type="text" value="{{$code}}" name="code" placeholder="{{__('code')}}" class="form-control" />
    </div>
    <div class="col-md-6">
      <label class="text-bold-600">{{Theme::title('search by keyword')}}: </label>
      <div class="input-group">
        <input type="text" value="{{$title}}" name="title" placeholder="{{__('input keyword')}} ..." class="form-control" />

        <span class="input-group-btn">
          <button class="btn btn-info" type="submit" type="button"><i class="ft ft-search"></i> {{__('search')}}</button>
        </span>
      </div>
    </div>
  </div>
  
  
</x-form>