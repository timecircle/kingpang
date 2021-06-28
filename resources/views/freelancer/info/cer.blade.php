
@if($freelancer->certificates->count())
<table class="table">
  <thead>
      <th style="width:1rem">
      </th>
      <th>{{Theme::title('certificate')}}</th>
      <th>{{Theme::title('issuer')}}</th>
      <th>{{Theme::title('form date')}}</th>
      <th></th>
  </thead>
  <tbody>
    @foreach( $freelancer->certificates as $freelancerCert  )
      <tr>
          <th>
            <button data-toggle="modal" data-target="#modal-delete-{{$freelancerCert->id}}"
            class="btn btn-sm btn-icon btn-danger">
            <i class="ft ft-x"></i></button>
             <button data-toggle="modal" data-target="#modal-edit-{{$freelancerCert->id}}"
              class="btn btn-sm btn-icon btn-info">
              <i class="ft ft-edit"></i></button>
          </th>
          <td>
            {{ $freelancerCert->certificate }}
          </td>
          <td>
            {{ $freelancerCert->issuer }}
          </td>
          <td>
            {{ $freelancerCert->at }}
          </td>
          <td>
            @if($freelancerCert->doc)
            <a href="{{ url($freelancerCert->doc->src) }}">
              <i class="ft ft-file"></i>
            </a>
            @endif
          </td>
      </tr>
      @push('outer')
        <div class="modal fade" id="modal-delete-{{$freelancerCert->id}}"
          tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form  action="{{ route('freelancer_certs.destroy',$freelancerCert) }}"
                  method="post">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-road2"></i> {{ $freelancerCert->certificate }}</h4>
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
        <div class="modal fade" id="modal-edit-{{$freelancerCert->id}}"
          tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                @include('freelancer.info.cer.edit')
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
        @include('freelancer.info.cer.add')
      </div>
    </div>
</div>
@endpush
@else

  @include('freelancer.info.cer.add')

@endif
