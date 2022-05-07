@props(['placeholder'=>'', 'value'=>null])
<div class="form-group">
    <label for="">
        @php
            $label = explode('|', $slot);
            $label = $label[0];
        @endphp
        {{ $label }}
        @php
            $type = 'text';
            $text = strtolower($slot);
            $text = explode(' ', $text);
            $text = implode('_', $text);
        $arr =  explode('|',$slot);
            if(count($arr) == 2){
                [$text, $type] = $arr;
            }
            $text = explode(' ', $text);
            $text = implode('_', $text);
        @endphp
    </label>
    <input value="{{ $value ?? old($text) }}" placeholder="{{ $placeholder }}" type="{{ $type }}" name="{{ strtolower($text) }}" class="form-control">
</div>