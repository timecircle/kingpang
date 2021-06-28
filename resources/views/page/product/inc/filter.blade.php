<div class="row">
  <x-block class="col-xs-6">
      <button class="btn  btn-min-width dropdown-toggle">
          {{__('service options')}}
      </button>
      <button class="btn  btn-min-width dropdown-toggle">
          {{__('budgets')}}
      </button>
      <button class="btn btn-min-width dropdown-toggle">
          {{__('delivery time')}}
      </button>
  </x-block>
  <x-block class="col-xs-6 ">
    <div class="float-xs-right btn-group mr-1 mb-1">
        <button type="button" class="btn btn-secondary dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('sort by')}}</button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Best Seller</a>
            <a class="dropdown-item" href="#">Recomend</a>
            <a class="dropdown-item" href="#">Newest Arrivals</a>
        </div>
    </div>
  </x-block>
</div>
