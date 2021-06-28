<form class="form" action="{{  route('freelancer_edus.update',$edu) }}"
    enctype="multipart/form-data"
    method="post">
    @method('PUT')
    @csrf

    <div class="form-body">
      <div class="card-body">
        <div class="card-block">

          <div class="row form-group">
              <div class="col-xs-8">
                <label>{{ Theme::title('school name') }}</label>
                @error('school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text"  placeholder="{{Str::title(__('school name')) }}"
                class="form-control"  value="{{ $edu->school }}"
                name="school" />
              </div>
              <div class="col-xs-4">
                <label>{{ Theme::title('state') }}</label>
                  <select name="state"  class="form-control">

                    @foreach(config('dev.state_edu') as $state)
                        <option value="{{ $state }}">  {{ Theme::title($state) }} </option>
                    @endforeach
                  </select>
              </div>
          </div>

          <div class="row form-group">
              <div class="col-xs-6">
                <label>{{ Theme::title('major') }}</label>
                @error('majors')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text"
                class="form-control"  value="{{ $edu->major }}"
                name="major" />
              </div>
              <div class="col-xs-6">
                <label>{{ Theme::title('document') }}</label>
                <input type="file"
                class="form-control" name="doc"/>
              </div>
          </div>

        </div>
      </div>

    </div>

  <div class="form-actions clearfix">

    <div class="buttons-group float-xs-right">
      <button type="reset" data-dismiss="modal"
      class="btn ">
                    {{__('Cancel')}}
      </button>
         <button type="submit" class="btn btn-primary mr-1">{{__('Save')}}</button>
     </div>
  </div>
</form>
