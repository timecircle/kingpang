@php
  $cols = ['name','email','phone','freelancer','created_at','status'];

@endphp

@section('title')
<h4>{{ Str::title(__("label.freelancer")) }}</h4>

@endsection

@section('content')
<div class="card">
  <div class="card-block row">

    <div id="table" class="table-responsive">
      <table class="table">
        <thead>

            @foreach ( $cols as $col )
              <th>

                  {{ Str::title($col)  }}
              </th>
            @endforeach

        </thead>

        <tbody>

          @foreach ($list as $row)

            <tr>

              @foreach ($cols as $col)
                <td>
                    @switch($col)

                        @case('freelancer')
                            {{$row->freelancer->name}}
                          @break
                        @default
                            {{$row->$col}}
                    @endswitch
                </td>
              @endforeach


            </tr>
          @endforeach
        </tbody>

      </table>

      <div class="pull-right">
        {{$list->render()}}

      </div>
    </div>
    </div>
</div>
@endsection

<x-layout.back />