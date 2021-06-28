@props(['freelancer'])
<x-form class="form" action="{{  route('freelancers.update',$freelancer) }}" enctype="multipart/form-data" method="PUT">

    <div class="container">


        <div class="col-md-8">
            <div class="form-group">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="text" value="{{$freelancer->name}}" placeholder="{{Theme::title('name')}}" class="form-control input-lg" name="name" />

            </div>
            <div class="card">

                <div class="card-body">

                    <div class="card-block">
                        <div class="row">

                            <div class="col-xs-6">

                                <div class="form-group">

                                    @error('work_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="email" value="{{ $freelancer->work_email }}" class="form-control" placeholder="email" name="work_email" />
                                </div>


                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">

                                    @error('work_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="number" value="$freelancer->work_phone" placeholder="work phone" class="form-control" name="work_phone" />
                                </div>
                            </div>

                        </div>



                        <div class="form-group">

                            <input type="text" placeholder="Job" value="{{$freelancer->job}}" required class="form-control" name="job" />
                        </div>
                        <div class="mt-1">

                            <textarea name="intro" id="intro" rows="8" placeholder="Intro" class="form-control">{{ $freelancer->intro }}</textarea>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card box">
                <div class="card-header">
                    <h4 class="card-title">{{ Theme::title('avatar') }}</h4>

                    <div class="heading-elements">
                        <a data-action="collapse"><i class="ft-minus"></i></a>
                    </div>
                </div>

                <div class="card-body collapse in text-xs-center">
                    <x-temp class="img-fluid" src="{{empty($freelancer->avatar) ? '': asset($freelancer->avatar->src)}}" style="height:120px" />
                </div>
            </div>

            <div>

            </div>
            <div class="box card">
                <div class="card-block">
                    <div class="form-group font-medium-1 text-bold-600">
                        {{$freelancer->user->email}}

                    </div>

                    <button type="button" class="btn btn-sm btn-block ">
                        {{Theme::title('change account')}}
                    </button>

                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="reset" class="btn btn-block ">
                                {{Theme::title('cancel')}}
                            </button>
                        </div>
                        <div class="col-xs-6">
                            <button id="btn_send" type="submit" class="btn btn-primary btn-block">
                                {{Theme::title('save')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-form>