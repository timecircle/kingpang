<form class="form" action="{{  route('freelancers.update',$freelancer) }}"
    enctype="multipart/form-data"
    method="post">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-block ">

          <div class="form-group">
            <label>{{Str::title(__('work phone')) }}</label>
            @error('work_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="number"  placeholder="{{Str::title(__('work phone')) }}"
            class="form-control"  value="{{$freelancer->work_phone}}"
            name="work_phone" id="work_phone" />
          </div>



        <label>Social:</label>
        <div class="form-group">

          <div class="input-group">
              <span class="input-group-addon">Facebook</span>
              <input type="hidden" name="array_key[]" value="facebook" >
              <input type="text" name="array_value[]"
              value="{{ empty($freelancer->social['facebook']) ? '': $freelancer->social['facebook'] }}"
              class="form-control" placeholder="facebook.com" >
          </div>
      </div>
      <div class="form-group">

        <div class="input-group">
            <span class="input-group-addon">Linkedin</span>
            <input type="hidden" name="array_key[]" value="linkedin" >
            <input type="text" name="array_value[]"
            value="{{ empty( $freelancer->social['linkedin'] ) ? '':  $freelancer->social['linkedin']  }}"
            class="form-control" placeholder="linkedin.com" >
        </div>
      </div>

      <div class="form-group">

        <div class="input-group">
            <span class="input-group-addon">Instagram</span>
            <input type="hidden" name="array_key[]" value="instagram" >
            <input type="text" name="array_value[]"
            value="{{ empty( $freelancer->social['instagram'] ) ? '': $freelancer->social['instagram']   }}"
             class="form-control" placeholder="instagram.com" >
        </div>
      </div>
    </div>
    </div>
</form>
