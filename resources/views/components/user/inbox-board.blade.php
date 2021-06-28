@props([
'user'
])
<ul class="nav nav-tabs flex nav-underline">
    <li class="nav-item flex-1 ">
        <a class="nav-link active" id="base-tab31" data-toggle="tab" href="#show-message" aria-expanded="true">
            <i class="ft ft-bell"></i> {{Theme::title('notify')}}
        </a>
    </li>
    <li class="nav-item flex-1">
        <a class="nav-link" id="base-tab32" data-toggle="tab" href="#show-inbox" aria-expanded="false">
            <i class="ft ft-inbox"></i> {{Theme::title('inbox')}}</a>
    </li>

</ul>

<div class="tab-content line-top px-1 pt-1">
    <div role="tabpanel" class="tab-pane active" id="show-message" aria-expanded="true">

        <div class="p-1 text-xs-center">

            <i class="icon-magnifier"></i>
            {{ Theme::title("you don't have a message") }}
        </div>


        <div class="inbox-footer p-1">

            <a class="text-muted" href="{{route('auth.notifies',$user)}}"> {{Theme::title('show all message')}} </a>
        </div>
    </div>
    <div class="tab-pane" id="show-inbox">
        <div class="p-1 text-xs-center">

            <i class="icon-magnifier"></i>
            {{ Theme::title("you don't have a inbox") }}
        </div>
        <div class="inbox-footer p-1">

            <a class="text-muted" href="{{route('auth.chat',$user)}}"> {{Theme::title('show all inbox')}} </a>
        </div>
    </div>

</div>