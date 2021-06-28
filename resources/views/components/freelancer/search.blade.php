@php
$search = (new App\Classes\Search('freelancer'))->get();
$name = empty($search->name) ? '' : $search->name;
$email = empty($search->email) ? '': $search->email;
$phone = empty($search->phone) ? '' : $search->phone;
$job = empty($search->job) ? '' : $search->job;
@endphp

<x-form class="form" action="{{route('search.find','freelancer')}}">
  <div class="row mb-2">
   
    <div class="col-md-2">
      <label class="text-bold-600">{{Theme::title('email')}}: </label>
      <input type="email" value="{{$email}}" name="email" placeholder="{{__('email')}}" class="form-control" />
    </div>
    <div class="col-md-2">
      <label class="text-bold-600">{{Theme::title('phone')}}: </label>
      <input type="phone" value="{{$phone}}" name="phone" placeholder="{{__('phone')}}" class="form-control" />
    </div>
    <div class="col-md-3">
      <label class="text-bold-600">{{Theme::title('jobs')}}: </label>
      <input type="text" value="{{$job}}" name="job" placeholder="{{__('job')}}" class="form-control" />
    </div>
    <div class="col-md-5">
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