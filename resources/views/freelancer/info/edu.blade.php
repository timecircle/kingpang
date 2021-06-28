

@if($freelancer->educations->count())


<table class="table">
  <thead>
      <th style="width:1rem">
      </th>
      <th>{{Theme::title('major')}}</th>
      <th>{{Theme::title('school name')}}</th>
      <th>{{Theme::title('start at')}}</th>
      <th></th>
  </thead>
  <tbody>
    @foreach( $freelancer->educations as $edu  )
      <tr>
          <th>
            <button data-toggle="modal" data-target="#modal-delete-{{$edu->id}}"
            class="btn btn-sm btn-icon btn-danger">
            <i class="ft ft-x"></i></button>
             <button data-toggle="modal" data-target="#modal-edit-{{$edu->id}}"
              class="btn btn-sm btn-icon btn-info">
              <i class="ft ft-edit"></i></button>
          </th>
          <td>
            {{ $edu->school }}
          </td>
          <td>
            {{ $edu->major }}
          </td>
          <td>
            {{ $edu->at }}
          </td>
          <td>
            @if($edu->doc)
            <a href="{{ url($edu->doc->src) }}" target="_blank">
              <i class="ft ft-file"></i>
            </a>
            @endif
          </td>
      </tr>
      @push('outer')
        <div class="modal fade" id="modal-delete-{{$edu->id}}"
          tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form  action="{{ route('freelancer_edus.destroy',$edu) }}"
                  method="post">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> {{ $edu->name }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            This data will be deleted
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-outline-primary">Accept</button>
                     </div>
                     @method('DELETE')
                     @csrf
                 </form>
              </div>
          </div>
        </div>
        <div class="modal fade" id="modal-edit-{{$edu->id}}"
          tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                @include('freelancer.info.edu.edit')
              </div>
            </div>
        </div>
      @endpush
    @endforeach
  </tbody>

</table>
<div class="card-block">
    <button data-toggle="modal" data-target="#modal-create"
    class="btn btn-primary btn-block"> <i class="ft ft-plus"></i>  </button>
</div>

@push('outer')
<div class="modal fade" id="modal-create"
  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        @include('freelancer.info.edu.add')
      </div>
    </div>
</div>
@endpush
@else

  @include('freelancer.info.edu.add')

@endif
