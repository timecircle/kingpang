<div class=" media profil-cover-details">
    <div class="media-left">
        @if($freelancer->avatar)
          <a href="{{ url($freelancer->link->pretty) }}" class="profile-image">
              <img class="rounded-circle img-border x100"
                src="{{ url($freelancer->avatar->src) }}"  />
          </a>
        @endif
    </div>
    <div class="media-body media-middle row">
        <div class="col-xs-6">
          <a href='{{ url($freelancer->link->pretty) }}' >
            <h4 class="card-tile">
              {{ $freelancer->name }}
            </h4>
            <p>  {{ $freelancer->job }}</p>
          </a>
          <x-button.contact class="btn" id="{{$freelancer->id}}" out="{{ Theme::title('contact me') }}" />
        </div>

    </div>
</div>
<div>{!!$freelancer->intro!!}</div>
