@php
$menu = App\Models\Category::root()->wherePrefix('service')->OrderBy('priority','desc')->get();
@endphp
<ul class="nav navbar-nav row">
  @foreach( $menu as $item)
  <li class="{{ $loop->last ? 'pull-right' :  'space' }} dropdown nav-item font-medium-2  ">
    <a class="dropdown-toggle  nav-link" href='{{url($item->link->pretty)}}'>
      {{$item->name}}
    </a>
    <div class="dropdown-menu {{ ($loop->index > 3 ) ? 'dropdown-menu-right' : '' }}">
      @foreach($item->childs()->get()->chunk(2) as $chunk )
      <div style="width:45rem">
        @foreach( $chunk as $row )

        <div class="col-xs-6">

          <a class="nav-link" href='{{url($row->link->pretty)}}'>
            {{$row->name}}
          </a>
        </div>
        @endforeach
      </div>
      @endforeach

    </div>
  </li>
  @endforeach
</ul>