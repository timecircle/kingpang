<form class="form" action="{{  route('freelancer_edus.store') }}"
    enctype="multipart/form-data"
    method="post">
    @csrf
    <input type="hidden" name="freelancer_id" value="{{$freelancer->id}}" />
    <div class="form-body">
      <div class="card-body">
        <div class="card-block">

          <div class="row form-group">
              <div class="col-xs-8">
                <label>{{Theme::title(__('school name')) }}</label>
                @error('school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text"  placeholder="{{Theme::title(__('school name')) }}"
                class="form-control"  value="{{old('school')}}"
                name="school" />
              </div>
              <div class="col-xs-4">
                <label>{{Theme::title(__('state')) }}</label>
                  <select name="state"  class="form-control">
                      <option value="graduated">  {{ __('graduated') }} </option>
                      <option value="attending">  {{__('attending')}}  </option>
                      <option value="learning">   {{__('still learning')}}</option>
                      <option value="incomplete"> {{ __('incomplete') }}  </option>
                      <option value="complete"> {{ __('complete') }}  </option>
                  </select>
              </div>
          </div>

          <div class="row form-group">
              <div class="col-xs-6">
                <label>{{Str::title(__('majors')) }}</label>
                @error('majors')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text"  placeholder="{{Str::title(__('majors')) }}"
                class="form-control"  value="{{old('majors')}}"
                name="major" />
              </div>
              <div class="col-xs-6">
                <label>{{Str::title(__('document')) }}</label>
                <input type="file"
                class="form-control" name="doc"  value="{{old('doc')}}"/>
              </div>
          </div>

        </div>
      </div>

    </div>

  <div class="form-actions clearfix">

    <div class="buttons-group float-xs-right">
      <button type="reset"  data-dismiss="modal"
      class="btn ">
                    {{__('Cancel')}}
      </button>
         <button type="submit" class="btn btn-primary mr-1">{{__('Save')}}</button>
     </div>
  </div>
</form>
