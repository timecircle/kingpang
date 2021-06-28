
<select name="status" class="form-control">
  @foreach (Config::get('dev.status') as $sta)
       @if(!empty($selected) && $selected == $sta)
           <option selected
           value="{{ $sta }}">
             {{__('status.'.$sta)}}
           </option>
      @else
          <option
          value="{{ $sta }}">
            {{__('status.'.$sta)}}
          </option>
      @endif
  @endforeach
</select>
