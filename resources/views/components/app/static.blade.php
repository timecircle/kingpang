@props([
'post'
])

<div class="section pt-6">
    <div class="app-w">


        {!! $post->content !!}
    </div>


</div>

<div style="z-index: 9;" class="app-w card p-1 line-bot fixed yt-0 text-xs-center">
    <h4 class="text-bold-600 text-xs-center">
       
        <label class=" pull-left" data-dismiss="modal">
            <i class="ft-arrow-left  pull-left  primary font-medium-4"></i>
        </label>
        {{ Theme::title( $post->name) }}
    </h4>
</div>