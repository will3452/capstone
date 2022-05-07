<span wire:poll>
    @php
        $status = \App\Models\Status::find(nova_get_setting('status'));
        $callable = $status->is_callable;
    @endphp
    @if ($callable)
<!--        <a target="_blank" class="btn btn-primary" href="{{ nova_get_setting('messenger_id')?? '#' }}">
            MESSAGE OR CALL THE DOCTOR
        </a>  -->
    @else 
        <a href="/messages" class="btn btn-primary">
            LEAVE A MESSAGE
        </a>
    @endif

</span>
