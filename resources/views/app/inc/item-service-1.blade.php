<div class="p-1">
  <div class="box-round" >
  <div class="row match-height">


      <div class="col-xs-6 ">
        <div class="card">

            @if($item->avatar)
              <img class="img-fluid  img-left" loading="lazy" src="{{ url($item->avatar->src) }}">
            @endif

        </div>
      </div>
      <div class="col-xs-6">
        <div class="card">
            <div class="clear pt-1 pr-1">
              <label class="pull-left">
                  <span class="primary">
                  <i class="fa fa-star"></i> 5.0 </span>
                  <span class="text-muted">(76)</span>
                </label>
                <div class="pull-right fonticon-wrap">
                      <span> <i class="ft-heart"></i> </span>
                </div>
            </div>
            <div class="clear pr-1" onclick="if_src('{{route('app.product',[$token,$item]) }}')" >
              <div class="text-justify">{{$item->name}}</div>

              <div class="float-xs-right ">
                  <p class="font-medium-1 primary">
                    {{ Theme::title('form') }} :
                    <span class="text-bold-600">
                    {{$item->price_format}}
                  </span>
                  </p>
              </div>
            </div>
        </div>
    </div>
  </div>
  </div>
</div>
