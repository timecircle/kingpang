  <label data-toggle="modal" data-target="#type-messenger"
   class="text-muted ml-2 pt-2">
    {{Theme::title('type a messsge...')}}
  </label>

@once
    @push('outer')
      <div class="modal fade" id="type-messenger"
        tabindex="-1" role="dialog">
          <div class="app-content">
            @include('app.inc.formMess')
          </div>
      </div>
    @endpush
@endonce
