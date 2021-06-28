@php
    $id   = uniqid('avatar_');
    $style= empty($style) ? 'scale' : $style
@endphp
<div id="{{$id}}"  >
    <button type="button"> X </button>

  <label  class="form-control text-xs-center" >
    @switch($style)
      @case('wide')

              <img  class="h-100"
                src="{{  empty($src) ?
                        url('vendor/me/images/upload.png') :
                        url($src) }}" />

          @break
       @default
      <img  class="img-fluid"
        src="{{  empty($src) ?
                url('vendor/me/images/upload.png') :
                url($src) }}" />
    
@endswitch

    <input type="file" style="display:none"
      accept="{{empty($accept) ? 'image/*' : $accept}}"
      name="{{empty($name) ? 'avatar' : $name}}">
    </label>

</div>
@push('script')
<script>
  avatarChange('{{$id}}');

</script>

@endpush
