
<div class="row">
  <table class="table" >
    <thead >
      <tr>
        <th></th>
        @stack('table-pack-header')
      </tr>
    </thead>
    <tbody>
      @foreach($rows as $row)
        <tr>
          <th> {{ Theme::title($row) }}</th>
          @stack('table-pack-row-'.$row)
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        @stack('table-pack-footer')
      </tr>
    </tfoot>
  </table>
</div>
