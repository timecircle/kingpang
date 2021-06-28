
@section('title')
<div class="content-header-title mb-2">
  <h2>
    {{ Theme::title('become to freelancer') }}
  </h2>
</div>
@endsection

@section('content')

<div class="content-body">
  <div class="card">
    <div class="card-block">

      <x-form class="form" enctype="multipart/form-data" action="{{  route('freelancers.store') }}">
    
        <input type="hidden" name="user_id" value="{{$user->id}}" />
        <div class="form-body">

          <div class="col-md-7">

            <div class="card">

              <div class="card-body">

                <div class="card-block">
                  <div class="row">
                    <div class="col-xs-4">

                    <x-temp class="img-fluid" style="height:120px" />

                    </div>
                    <div class="col-xs-8">

                      <div class="form-group">
                        <label>{{Str::title(__('name'))}}</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" placeholder="{{Str::title(__('label.transaction name')) }}" class="form-control" value="{{ $user->name }}" name="name" id="name" />

                      </div>


                      <div class="form-group">
                        <label>{{Str::title(__('job'))}}</label>
                        @error('job')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="text" placeholder="{{Str::title(__('label.job')) }}" class="form-control" name="job" id="job" />
                      </div>

                    </div>

                  </div>

                  <div class="form-group mt-2">

                    <textarea name="intro" id="intro" rows="3" placeholder="{{Str::title(__('Intro')) }}" class="form-control">{{ old('intro') }}</textarea>
                  </div>



                </div>
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="card">
              <div class="card-block ">

                <div class="form-group">
                  <label>{{Str::title(__('work phone')) }}</label>
                  @error('work_phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <input type="number" placeholder="{{Str::title(__('work phone')) }}" class="form-control" name="work_phone" id="work_phone" />
                </div>



                <label>Social:</label>
                <div class="form-group">

                  <div class="input-group">
                    <span class="input-group-addon">Facebook</span>
                    <input type="hidden" name="array_key[]" value="facebook">
                    <input type="text" name="array_value[]" class="form-control" placeholder="facebook.com">
                  </div>
                </div>
                <div class="form-group">

                  <div class="input-group">
                    <span class="input-group-addon">Linkedin</span>
                    <input type="hidden" name="array_key[]" value="linkedin">
                    <input type="text" name="array_value[]" class="form-control" placeholder="linkedin.com">
                  </div>
                </div>

                <div class="form-group">

                  <div class="input-group">
                    <span class="input-group-addon">Instagram</span>
                    <input type="hidden" name="array_key[]" value="instagram">
                    <input type="text" name="array_value[]" class="form-control" placeholder="instagram.com">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="form-actions clearfix">

          <div class="buttons-group float-xs-right">
            <button type="reset" class="btn ">
              {{__('Cancel')}}
            </button>
            <button type="submit" class="btn btn-primary mr-1">{{__('Join with us')}}</button>
          </div>
        </div>

      </x-form>
    </div>
  </div>
</div>
@endsection

<x-layout.auth :user="$user" />