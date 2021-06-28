@php
    $inc   = 'dev.master.com.formPackPrice';
    $id    =  uniqid('table_');
@endphp

<div id="{{$id}}" class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th></th>
        @for($i=0; $i < count($packs);$i++ )
          <th>
            @if($i)
              @include("$inc.ex",
              [
                'out'   => empty($packs[$i]->pack) ? $packs[$i] : $packs[$i]->pack,
                'check' => empty($packs[$i]->pack) ? '' : 'checked'
              ])
            @else
              <label>
                {{ empty($packs[$i]->pack) ? __($packs[$i]) : __($packs[$i]->pack) }}
              <label>
            @endif
          </th>
        @endfor
      </tr>
    </thead>
    <tbody>
      @foreach(config('dev.attributes') as $atb)
        <tr>
          <th>{{__($atb)}}</th>
          @foreach($packs as $pack)

          @php
            $key   =  empty($pack->pack) ? $pack."_$atb" : $pack->pack."_$atb";
            $value =  empty($pack->$atb) ? old($pack."_$atb") : $pack->$atb;
            $class =  empty($pack->pack) ? $id."_$pack" : $id."_$pack->pack";
          @endphp
            <td>
              @error($key)
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              @include("$inc.$atb")
            </td>
          @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
