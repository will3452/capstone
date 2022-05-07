<div wire:poll>
    @auth
        @php
            $status = \App\Models\Status::find(nova_get_setting('status'));
            $color = $status->color;
            $text = $status->text;
            $label = $status->label;
        @endphp
        <div class="d-flex align-items-center mb-2">
            <div style="width:10px; height:10px; border-radius:50%;background:{{ $color }}"></div>
             <span class="ml-2">{{ $text }}</span>
        </div>
    @endauth
</div>
