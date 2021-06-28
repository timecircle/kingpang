
@php
$search = (new App\Classes\Search('order'))->get();
$choices= empty($search->categories) ? [] : $search->categories;
$name = empty($search->name) ? '' : $search->name;
@endphp

<x-form class="form row" action="{{route('search.find','order')}}">
  <div class="col-md-6">
    <label class="text-bold-600">{{__('Search by keyword')}}: </label>
    <div class="input-group">
      <input type="text" value="{{$name}}" name="name" placeholder="{{__('input keyword')}} ..." class="form-control" />

      <span class="input-group-btn">
        <button class="btn btn-info" type="submit" type="button"><i class="ft ft-search"></i> {{__('search')}}</button>
      </span>
    </div>
  </div>
</x-form>