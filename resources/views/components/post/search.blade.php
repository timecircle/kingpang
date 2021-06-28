@props([
'is' => 'post',
])

@php
$search = (new App\Classes\Search($is))->get();
$choices= empty($search->categories) ? [] : $search->categories;
$name = empty($search->name) ? '' : $search->name;
@endphp

<x-form class="form row" action="{{route('search.find',$is)}}">
  @if($is=='post')
  <div class="col-md-4">
    <label class="text-bold-600">{{__('Categories')}}: </label>

    <x-select.multi class="form-control" :choices="$choices" :list="App\Models\Category::root()->whereNull('prefix')->arrange()" name="categories[]" />
  </div>
  @endif
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