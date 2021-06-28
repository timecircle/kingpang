
<div
class="w-100 h-100 img-bg {{ empty($class) ? '' : $class }}"
style="
  background-position: center center;
  background-size: cover;
  background-image: url('{{ empty($src) ? '' : url($src) }}');
  {{  empty($style) ? '': $style  }}">

</div>
