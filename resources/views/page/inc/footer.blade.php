@php
  $address = "tầng 2, Tòa nhà số 110 Nguyễn Văn Linh, Phường Tân Thuận Tây, Quận 7, Thành phố Hồ Chí Minh, Việt Nam";
  $name    =  "CÔNG TY TNHH MTV LATH GROUP";
  $tel     =  "+84. 932776062";
  $email   =  "info@kingpang.vn";
  $worktime=  "from 9:00 to 18:00";
  $right   =  "Copyright @ 2021 kingpang lnc. All rights reserved";
  $abouts  =[
    url('about')    =>  'about',
    url('blog')     =>  'blog',
    url('careers')  =>  'careers',
  ];

  $customers  = [
    url(Post::static('term use')->link->pretty) => 'term use',
    url(Post::static('term payment')->link->pretty) => 'term payment',
    url(Post::static('privacy policy')->link->pretty) => 'privacy policy',
    url('review') =>  'review',
    url('faq')  =>  'faq',
  ];

  $qrcode = url('media\image\app-kingpang.png');

  $store  = [
    "https://play.google.com/store/apps/details?id=com.kingpang.kpapp"  =>  asset('theme\images\logo\app-google.png'),
    "#" =>   asset('theme\images\logo\app-apple.png')
  ];

  $social= [
      "#facebook" =>  asset('theme\images\logo\facebook.png'),
      "#youtube" =>  asset('theme\images\logo\youtube.png'),
      "#zalo" =>  asset('theme\images\logo\zalo.png'),
  ];
@endphp

<x-block tag="footer" id="footer" class="footer footer-static footer-light navbar-border mb-2">
    <div class="container">
        <div class="row mt-2">
          <div class="col-md-4">
              <x-logo />

            <div class="card-body mt-2">

              <div>{{$name}}</div>
              <div>{{Theme::title('address')}} : {{ $address }}</div>
              <div class="row">
                <label class="col-xs-2"> Tel:</label> {{ $tel }}
              </div>

              <div class="row">
                <label class="col-xs-2">Email:</label> {{ $email }}
              </div>

            </div>
          </div>
          <div class="col-xs-2">
            <h4>{{ Theme::title('about KingPang')}} </h4>

            <ul class="nav navbar row">
              @foreach($abouts as $link=>$name)
                  <li class="nav-item">
                    <a href="{{ $link }}"
                    class="nav-link">{{ Theme::title($name) }} </a>
                  </li>
              @endforeach
            </ul>
            <div class="li-t">
              <h4 class="mt-1"> {{ Theme::title('work time')}}  </h4>
              <div>{{$worktime}}</div>
            </div>
          </div>
          <div class="col-md-3">
              <h4 class="card-title">
                {{ Theme::title('customer career')}}
              </h4>
              <ul class="nav navbar row">
                @foreach($customers as $link=>$name)
                    <li class="nav-item">
                      <a href="{{ $link }}" class="nav-link">
                        {{ Theme::title($name) }}
                      </a>

                    </li>
                @endforeach
              </ul>

          </div>
          <div class="col-md-3">
            <h4 class="card-title" >
              {{ Theme::title('app KingPang')}}
            </h4>
            <div class="row mb-1">
              <div class="col-xs-5">
                <img loading="lazy" class="img-fluid" src="{{ $qrcode }}" />
              </div>
              <div class="col-xs-7">
                @foreach( $store as $link=> $name)
                    <a href="{{$link}}">
                        <img loading="lazy" src="{{ $name }}" />
                    </a>
                @endforeach
              </div>
            </div>
            <div class="li-t">
              <div class="mt-1">
                  <h4 tag="mr-2" class="card-title">
                    {{ __('Fllow KingPang')}} </h4>
                  @foreach( $social as $link=> $name)
                    <a href="{{$link}}">
                        <img loading="lazy" class="ic" src="{{ $name }}" />
                    </a>
                  @endforeach

              </div>
            </div>

          </div>

        </div>
    </div>
    <div class="container-fluid line-t">
      <div class="p-1 text-xs-center">
        {{__($right)}}
      </div>
    </div>
</x-block>
