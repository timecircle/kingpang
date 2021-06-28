@props([
'product' => new App\Models\Product,
])
@php
$name = $product->pack;
$price= $product->price;
$delivery = $product->delivery;
$revisions = $product->revisions;
$description = $product->description;
@endphp
<div class="card-block">
  <div class="form-group row">
    <div class="col-md-4">

      <label class="font-medium-1"> {{ Theme::title('price') }} : </label>
      @error($name."_price")
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <div class="input-group">

        <input type="number" value="{{$price}}" class="form-control" name="{{$name}}_price">
        <span class="input-group-addon">
          đ
        </span>
      </div>
    </div>
    <div class="col-md-4">
      <label class="font-medium-1"> {{ Theme::title('delivery') }} : </label>
      @error($name."_delivery")
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <div class="input-group">

        <input type="number" placeholder="delivery" class="form-control" value="{{$delivery}}" name="{{$name}}_delivery">
        <span class="input-group-btn">
          <select class="btn btn-info" name="{{$name}}_duration">
            <option value="days"> {{__('days')}} </option>
            <option value="hours"> {{__('hours')}} </option>
          </select>
        </span>
      </div>

    </div>
    <div class="col-md-4">
      <label class="font-medium-1"> {{ Theme::title('revisions') }} : </label>
      @error($name."_revisions")
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <div class="input-group">

        <input type="number" class="form-control"  value="{{$revisions}}" name="{{$name}}_revisions" />
        <span class="input-group-addon">
          {{__('times')}}
        </span>
      </div>
    </div>

  </div>
  <div class="form-group">
    @error($name."_description")
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label class="font-medium-1"> {{ Theme::title('description') }} : </label>
    <textarea rows="5" name="{{$name}}_description" class="form-control">{{$description}}</textarea>
  </div>
</div>