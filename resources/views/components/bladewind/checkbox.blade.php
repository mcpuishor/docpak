@props([
    'name' => defaultBladewindName(),
    'value' => null,
    'label' => null,
    'checked' => false,
    'disabled' => false,
    'type' => 'checkbox',
    'class' => 'rounded-md',
    'label_css' => '',
    'color' => config('bladewind.checkbox.color', 'primary'),
    'add_clearing' => config('bladewind.checkbox.add_clearing', true),
])
@php
    $name = preg_replace('/[\s-]/', '_', $name);
    $checked = parseBladewindVariable($checked);
    $disabled = parseBladewindVariable($disabled);
    $colour = defaultBladewindColour($color);
    $text_colour = ($colour == 'black') ? 'text-black' : "text-$colour-600 dark:bg-dark-800";
    $ring_colour = ($colour == 'black') ? 'ring-black' : "ring-$colour-500";
    $border_colour = ($colour == 'black') ? 'border-slate-500/50' : "border-$colour-500/50";
    $add_clearing = parseBladewindVariable($add_clearing);
@endphp

<label class="inline-flex items-center cursor-pointer text-sm @if($disabled) opacity-60 @endif @if($add_clearing) mb-3 @endif {{ $label_css }}">
    <input
            type="{{ $type }}"
            name="{{ $name }}"
            class="{{$text_colour}} size-6 @if($add_clearing) mr-2 rtl:ml-2 @endif disabled:opacity-50 focus:{{$ring_colour}} border-2 {{$border_colour}} focus:ring-opacity-25 bw-checkbox {{$class}}"
            @if($disabled) disabled @endif
            @if($checked) checked @endif
            value="{{ $value }}"
    />
    {!! $label !!}
</label>
