@extends('freelancer.master.index')
@section('title')
<h4>{{ Str::title(__("customer")) }}</h4>
@endsection
@php
  $cols = ['code','contact_email','contact_phone','created_at','status'];

@endphp
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
                  {{$row->$col}}
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
