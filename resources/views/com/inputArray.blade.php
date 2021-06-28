@php
    $id     = uniqid('input_');
    $labels = empty($labels) ? ['Key','Value'] : $labels;

    $arrs   = empty($arrs) ? [] : $arrs;
    $name   = empty($name) ? 'array' : $name;
@endphp
<div id="{{$id}}"  >



  <div class="row">
      <div class="col-xs-5">
        <label>{{ Str::title(__($labels[0]))}}</label>
        <input type="text" class="form-control input-sm key"/>
      </div>

      <div class="col-xs-7">
        <label>{{ Str::title(__($labels[1])) }}</label>
          <div class="input-group">
            <input type="text" class="form-control input-sm value"/>
            <span class="input-group-btn">
              <button type="button" class="btn btn-sm btn-info  add"> <i class="ft ft-plus"> </i></button>
            </span>
        </div>
      </div>
  </div>
  <div class="preview mt-2">

    @foreach($arrs as $item)
    <div class="row mt-1">
      <div class="col-xs-5"><input type="text" name="{{$name}}_key[]" value="{{$item->name}}" class="form-control input-sm"/></div>
      <div class="col-xs-7"><div class="input-group"><input type="text" name="{{$name}}_val[]" value="{{$item->link}}" class="form-control input-sm"/>
        <span class="input-group-btn">
          <button type="button" onClick="$(this).parent().parent().parent().parent().remove()" class="btn btn-sm btn-danger">
            <i class="ft ft-x"></i> </button>
          </span>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
@push('script')
<script>
  inputArray('{{$id}}','{{  $name }}');
</script>
@endpush
