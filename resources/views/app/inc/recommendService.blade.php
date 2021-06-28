
  <div class="content-body">

    @foreach($recommendService->chunk(2) as $chunk)
      <div class="row match-height bt mt-1">
        @foreach($chunk as $item)
          <div class="col-xs-6">
              @include('app.inc.item-service')
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
