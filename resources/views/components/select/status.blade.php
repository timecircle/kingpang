<select name="status" class="form-control">
  @foreach (['publish','draft'] as $sta)
  <option value="{{ $sta }}">
    {{__($sta)}}
  </option>
  @endforeach
</select>