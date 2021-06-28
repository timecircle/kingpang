@props([
'id'=> 0,
'prefix'=>null,
'action'=>'categories.update',
'title' =>'edit category',
'category' => new App\Models\Category])

<x-form enctype="multipart/form-data" method="{{$category->id ? 'PUT' :'POST' }}" action="{{ route($action,$category) }}">
    <input type="hidden" name="parent_id" value="{{$id}}" />
    @if($prefix)
    <input type="hidden" name="prefix" value="{{$prefix}}" />
    @endif
    <div class="modal-header">
        <h4 class="pull-left" id="myModalLabel2"><i class="fa fa-road2"></i>{{Theme::title($title)}}</h4>

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    <div class="modal-body">
        <div class="card-block">

            <div class="row">
                <div class="col-xs-5 box">
                    @if(empty($category->avatar))
                    <x-temp class="img-fluid"  />
                    @else
                    {{$category->avatar->src}}
                    <x-temp class="img-fluid" src="{{ asset($category->avatar->src) }}" style="height:120px" />
                    @endif
                </div>
                <div class="col-xs-7">

                    <div class="form-group">
                        <input type="text" value="{{$category->name}}" placeholder="{{ Theme::title('name') }}" class="form-control" name="name" />
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="{{ Theme::title('code') }}" value="{{$category->code}}" class="form-control" name="code" id="code" />
                    </div>
                    <div class="form-group">
                        <div class="input-group ">
                            <span class="input-group-addon">Priority</span>
                            <input type="number" name="priority" placeholder="priority" class="form-control" value="{{ empty($category->priority) ? 0 : $category->priority   }}">
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group mt-1">
                <textarea class="form-control" placeholder="description" name="description" id="description">{{$category->description}}</textarea>
            </div>
        </div>
    </div>

</x-form>