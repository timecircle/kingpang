<form class="form" action="{{  route('freelancer_certs.store') }}"
    enctype="multipart/form-data"
    method="post">
    @csrf
    <input type="hidden" name="freelancer_id" value="{{$freelancer->id}}" />
    <div class="form-body">
      <div class="card-body">
        <div class="card-block">

          <div class="row form-group">
              <div class="col-xs-8">
                <label>{{Str::title(__('certificate')) }}</label>
                @error('certificate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text"  placeholder="{{Theme::title('certificate') }}"
                class="form-control"  value="{{old('certificate')}}"
                name="certificate" />
              </div>
              <div class="col-xs-4">

                <label>{{Theme::title('date of issue') }}</label>
                @error('issued')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group">
    								<span class="input-group-addon">
    									<span class="fa fa-calendar-o"></span>
    								</span>
    								<input type='date' class="form-control  pickadate"
                    name="at"
                     value="{{old('at')}}" />
    							</div>
              </div>
          </div>


          <div class="row form-group">
              <div class="col-xs-6">
                  <label>{{Theme::title('issued by') }}</label>
                @error('issuer')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="text"  placeholder="{{Str::title(__('issued')) }}"
                class="form-control"  value="{{old('issuer')}}"
                name="issuer" />
              </div>

              <div class="col-xs-6">
                <label>{{Str::title(__('doc')) }}</label>
                <input type="file"
                class="form-control" name="doc"  value="{{old('doc')}}"/>
              </div>
          </div>

        </div>
      </div>

    </div>


    <div class="form-actions clearfix">

      <div class="buttons-group float-xs-right">
        <button type="reset"
        class="btn ">
                      {{__('Cancel')}}
        </button>
           <button type="submit" class="btn btn-primary mr-1">{{__('Save')}}</button>
       </div>
    </div>

    @push('script')
    <script>
      $('.pickadate').pickadate();
    </script>

    @endpush

</form>
