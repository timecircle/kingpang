@if ($paginator->hasPages())
   
    <div class="p-1" style="width:25rem">
     {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
      
            <div class="col-xs-6 pull-right" ><a class="btn btn-block  btn-info" href="{{ $paginator->previousPageUrl() }}" rel="prev">{{Theme::title('previous')}}</a></div>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="col-xs-6 pull-right"><a class="btn btn-block btn-info" href="{{ $paginator->nextPageUrl() }}" rel="next">{{Theme::title('next')}}</a></div>
        @endif
      
    </div>
@endif
