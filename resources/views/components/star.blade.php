@props(['rate' => 3])

@for( $i=0 ; $i<5; $i++ ) <i class=" fa fa-star {{ $i  < $rate ? 'primary' : '' }} "></i>
  @endfor