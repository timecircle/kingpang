<x-form action="{{  route('freelancers.store') }}">
    <div style="z-index: 99; top:0" class="fixed block ">
        <div class="row bg-white line-b p-1">
            <div class="col-md-6">
                <h2 class="content-title">
                    {{Theme::title('freelancer register')}}
                </h2>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <button id="btn_send" type="submit" class="btn btn-primary">
                        {{Theme::title('send')}}
                    </button>
                    <button type="button" class="btn btn-info" onclick="parent.location.reload();">
                        <span aria-hidden="true"> X </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-top:6rem;" class="container">


        <div class="col-md-8">
            <div class="form-group">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="text" value="{{old('name')}}" placeholder="{{Theme::title('name')}}" class="form-control input-lg" name="name" />

            </div>
            <div class="card">

                <div class="card-body">

                    <div class="card-block">
                        <div class="row">

                            <div class="col-xs-6">

                                <div class="form-group">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="email" value="{{ old('email') }}" class="form-control" placeholder="email" name="email" />
                                </div>


                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">

                                    @error('work_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="number" value="{{old('work phone')}}" placeholder="work phone" class="form-control" name="work_phone" id="work_phone" />
                                </div>
                            </div>

                        </div>



                        <div class="form-group">

                            <input type="text" placeholder="Job" value="{{old('job')}}" required class="form-control" name="job" />
                        </div>
                        <div class="mt-1">

                            <textarea name="intro" value="{{old('intro')}}" rows="5" placeholder="Intro" class="form-control">{{ old('intro') }}</textarea>
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

                <div class="card-body collapse text-xs-center">
                    <x-temp class="img-fluid" style="height:120px" />
                </div>
            </div>

            <div>

            </div>
            <div class="box card p-1">
                <div class="form-group">

                    <input type="password" placeholder="password" class="form-control" required name="password" />
                </div>
                <div class="form-group">

                    <input type="password" placeholder="password confirm" class="form-control" name="password_confirmation" required autocomplete="password" />
                </div>
                <div class="row">
                    <label class="col-xs-4 font-medium-2"> Status :</label>
                    <div class="col-xs-8">
                        <x-select.status />

                    </div>

                </div>
            </div>

        </div>


    </div>
</x-form>