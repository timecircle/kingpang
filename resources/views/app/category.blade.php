@extends('app.inc.master')

@section('content')
<div class="pt-6 bg-white">
  <div class="app-width ontop fixed yt-0">
    <div class="card-header">
      <div class="row  line-bot">
        <div class="col-xs-1">
          <div onclick="parent.md_hide('#modal-if')"
          class="pt-1 fonticon-wrap">
                <i class="ft-arrow-left  primary font-medium-4"></i>
            </div>
        </div>
        <div class="col-xs-11">
          @include('app.inc.inputSearch')
        </div>
      </div>



    </div>
  </div>


  <div class="content-wrapper mt-2">

    <div class="content-body">


      @foreach($recommendService as $item)

            @include('app.inc.item-service-1')

      @endforeach
    </div>

  </div>

</div>

@endsection
