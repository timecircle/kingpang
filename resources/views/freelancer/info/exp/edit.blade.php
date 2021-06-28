<form class="form" action="{{  route('freelancer_expes.update',$expe) }}"
    enctype="multipart/form-data"
    method="post">
    @csrf

  <div class="form-body">
    <div class="card-body">
      <div class="card-block">

        <div class="row form-group">
            <div class="col-xs-8">
              <label>{{ Theme::title(__('company name')) }}</label>
              @error('company')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <input type="text"  placeholder="{{ Theme::title(__('company name')) }}"
              class="form-control"  value="{{ $expe->company }}"
              name="company" />
            </div>
            <div class="col-xs-4">
              <label>{{Theme::title(__('from day')) }}</label>
              @error('at')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <div class="input-group">
  								<span class="input-group-addon">
  									<span class="fa fa-calendar-o"></span>
  								</span>
  								<input type='text' class="form-control  pickadate"
                  name="at"
                   value="{{ $expe->at }}" />
  							</div>
            </div>
        </div>


        <div class="row form-group">
            <div class="col-xs-6">
              <label>{{Theme::title('position') }}</label>
              @error('position')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <input type="text"  placeholder="{{ Theme::title('position') }}"
              class="form-control"  value="{{$expe->position}}"
              name="position" />
            </div>

        </div>

      </div>
    </div>

  </div>

  <div class="form-actions clearfix">

    <div class="buttons-group float-xs-right">
      <button type="reset" data-dismiss="modal"
      class="btn ">
                    {{__('cancel')}}
      </button>
         <button type="submit" class="btn btn-primary mr-1">{{__('save')}}</button>
     </div>
  </div>

</form>
@push('script')
<script>
  $('.pickadate').pickadate();
</script>

@endpush
