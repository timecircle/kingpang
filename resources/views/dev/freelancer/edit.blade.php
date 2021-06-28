@section('title')
<div class="container ">
  <ul class="nav nav-tabs mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#tab31" >
        <h3 class="content-header-title"> {{ Theme::title('info') }} </h3>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tab31" >
          {{Theme::title('education')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tab32" >
          {{Theme::title('certificate')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tab33" >
          {{Theme::title('experience')}}</a>
      </li>
    </ul>
    
</div>

@endsection
@section('content')
<x-freelancer.edit :freelancer="$freelancer" />
@endsection

<x-layout.freelancer :freelancer="$freelancer"  />