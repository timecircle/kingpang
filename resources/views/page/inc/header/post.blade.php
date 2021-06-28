<x-block class="container p-2">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-xs-5">
          <x-logo />
        </div>
        <div class="col-xs-7 ">
          <fieldset class="position-relative">
              <input type="text" class="form-control input-sm p-1 "
              placeholder="{{Theme::title('Post')}}">
              <div class="form-control-position">
              <i class="ft-search danger "></i>
              </div>
            </fieldset>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="float-xs-right"><x-menu.top /></div>
    </div>
  </div>
</x-block>

<x-block class="container-fluid line-t line-b" >
  <div class="container">
    <div class="row">
      <div class="col-md-6 ">
        <ul class="breadcrumb p-0 mt-1">
          @foreach($category->road() as $item)
            <li class="breadcrumb-item text-bold-600">
                <a  href="{{url($item->link->pretty)}}" >
                  {{  $item->name  }}
                </a>
            </li>
          @endforeach
          <li class="breadcrumb-item text-bold-600">
            <a class="nav-link" href="{{url($category->link->pretty)}}" >
                {{  $category->name }}
            </a>
          </li>
        </ul>

      </div>
      <div class="col-md-6 ">
        <div class="float-xs-right">
          <x-menu.post
            id="{{ empty($category->parent_id) ? $category->id :  $category->parent_id   }}" />
        </div>
      </div>
    </div>
  </div>
</x-block>
