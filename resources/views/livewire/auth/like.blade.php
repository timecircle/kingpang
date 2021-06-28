<label class="like {{ $class ?? 'font-medium-2' }}" >

  <a wire:model="count" class="{{ $this->liked ? 'red' : '' }} " {{ Auth::check() ? "wire:click=like" : "data-toggle=modal data-target=#modal-login" }}>
    <i class="fa fa-heart"></i>
  </a>
 
</label>