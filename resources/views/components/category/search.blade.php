@props([
  'prefix'  =>   null
])
@php
$find = "category_$prefix";
$search = (new App\Classes\Search("category_$prefix"))->get();
$name = empty($search->name) ? '' : $search->name;

@endphp

<x-form class="form" action="{{route('search.find',$find)}}">
  <div class="row">
   
    <div class="col-md-6">
      <label class="text-bold-600">{{Theme::title('search by keyword')}}: </label>
      <div class="input-group">
        <input type="text" value="{{$name}}" name="name" placeholder="{{__('input keyword')}} ..." class="form-control" />

        <span class="input-group-btn">
          <button class="btn btn-info" type="submit" type="button"><i class="ft ft-search"></i> {{__('search')}}</button>
        </span>
      </div>
    </div>
  </div>
  
  
</x-form>