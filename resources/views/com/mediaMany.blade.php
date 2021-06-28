@php
    $id   = uniqid('avatar_');
@endphp
<div id="{{$id}}" >
<div class="form-group" >
  <button type="button">X</button>
  <label class="form-control" > <span>{{__('Choose files')}}</span>
    <input type="file" multiple style="display:none"
      accept="{{empty($accept) ? 'image/*' : $accept}}"
      name="{{empty($name) ? 'media' : $name}}">
        <div class="preview"></div>
  </label>
</div>

</div>
@push('script')
<script>
    mediaMany('{{$id}}');
</script>
@endpush
