@extends('freelancer.master.index')
@section('title')
<h4>{{ Theme::title("info") }}</h4>
@endsection
@section('content')
    <div class="col-xs-8 offset-xs-2">
      <ul class="nav nav-tabs nav-top-border no-hover-bg">
        <li class="nav-item">
           <a class="nav-link {{  request('tab','info') == 'info' ? 'active' :'' }}"
           id="info-tab"
           href="{{ route('freelancer.info')  }}">
             {{ Theme::title('info') }} </a>

        </li>
        <li class="nav-item">
          <a class="nav-link {{  request('tab') == 'edu' ? 'active' :'' }}"
          id="edu-tab"
          href="{{ Theme::url(['tab'=>'edu'])  }}"  >
          {{ Theme::title('education') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  request('tab') == 'cer' ? 'active' :'' }}"
          id="cer-tab"
          href="{{ Theme::url(['tab'=>'cer'])  }}"   >
          {{ Theme::title('certificate')  }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{  request('tab') == 'exp' ? 'active' :'' }}"
          id="exp-tab"
          href="{{ Theme::url(['tab'=>'exp'])  }}"   >
            {{ Theme::title('experience') }}
          </a>
        </li>
      </ul>
    <div class="card">
      <div class="card-block">

      <div class="card-body">

           @include($inc)

        </div>
    </div>
  </div>
</div>


@endsection
