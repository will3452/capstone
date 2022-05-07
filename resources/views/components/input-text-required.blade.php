@props(['placeholder'=>'', 'value'=>null])
<div class="form-group">
    <label for="">
        @php
            $label = explode('|', $slot);
            $label = $label[0];
        @endphp
        {{ $label }}
        <span class="text-danger">
            *
        </span>
        @php
            $text = strtolower($slot);
            $text = explode(' ', $text);
            $text = implode('_', $text);
            $type = 'text';
        $arr =  explode('|',$slot);
            if(count($arr) == 2){
                [$text, $type] = $arr;
            }
        @endphp
    </label>
    <input value="{{ $value ?? old(strtolower($text)) }}" placeholder="{{ $placeholder }}" type="{{ $type }}" name="{{ strtolower($text) }}" required class="form-control">
    @error(strtolower($text))
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>