@push('script')
<script>
  $(document).ready(function() {
    $('.select2-placeholder-multiple').select2();
  });
</script>
@endpush
<form class="form" action="{{  route('freelancers.update',$freelancer) }}"
    enctype="multipart/form-data"
    method="post">
    <input type="hidden" name="user_id" value="{{$freelancer->user->id}}" />
    @csrf
    @method('PUT')
  <div class="form-body">
      <div class="card">

          <div class="card-body">

              <div class="card-block">
                <div class="row">
                    <div class="col-xs-4">

                        @include('com.avatarChange',[
                            'src' => empty($freelancer->avatar) ? '':
                            $freelancer->avatar->src
                          ])

                    </div>
                    <div class="col-xs-8">

                      <div class="form-group">
                      <label> {{Str::title(__('transaction name')) }}</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" placeholder="{{Str::title(__('transaction name')) }}"
                        class="form-control" value="{{$freelancer->name}}"
                        name="name" id="name" />

                      </div>

                      <div class="form-group">
                          <label> {{Theme::title('job') }}</label>

                          <textarea   class="form-control"
                          placeholder="{{Str::title(__('job')) }}">{{$freelancer->job}}</textarea>
                      </div>
                      

                    </div>
                </div>

                <div class=" mt-1">

                    <textarea  name="intro" id="intro" rows="5" placeholder="{{Str::title(__('Intro')) }}"
                    class="form-control" >{{$freelancer->intro}}</textarea>
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
</form>
