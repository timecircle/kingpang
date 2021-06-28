@php
    $id    =  uniqid('table_');
    $index =  0;
    $selected = empty($selected) ? 0 : $selected;
@endphp

<div id="{{$id}}" class="h-100" style="overflow: auto;">
  @foreach($productType->branchs() as $branch)
  @php
    $check  = ($branch->id == $selected) ? 'checked' :'';
    $pad    = '';
    if(!$selected && !$index){
      $check  = 'checked';
    }
    for($i=0;$i<$branch->level;$i++){
      $pad  .= '::::';
    }
    $index++;
  @endphp
  <div class="form-group {{ $check }}">
    <label class="display-inline-block custom-control custom-radio">
        <input type="radio" {{ $check }}
          name="category_id"
          value="{{$branch->id}}"
          class="custom-control-input">
        <span class="bg-success custom-control-indicator"></span>
        <span class="custom-control-description">
           {{$pad." $branch->name"}}
        </span>
    </label>
  </div>
  @endforeach
</div>
