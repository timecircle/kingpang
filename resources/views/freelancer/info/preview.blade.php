
  <div class="card-block box">
    <div class="text-xs-center">
        <div class="media profil-cover-details">
          @if($freelancer->avatar)
          <a href="#" class="profile-image">
              <img src="{{ url($freelancer->avatar->src) }}" class="rounded-circle img-border width-100 height-100" alt="Card image">
          </a>
          @endif
            <h3 class="card-title">{{ $freelancer->name }}</h3>
            <div class="block">
                <span class="font-medium-2 mr-1">
                  <i class="fa fa-star "></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </span>
                <label class="text-bold-600 font-medium-2"> 5.0 / 969 Đánh giá</label>
            </div>

        </div>
      </div>
  </div>

  <div class="card-header row">
    <h4 id="intro" class="card-title">
      {{ __('intro') }}</h4>
  </div>
  <div class="card-block box">

      {{$freelancer->intro}}

  </div>
