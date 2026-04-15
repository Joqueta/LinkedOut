@props(['padding' => true, 'shadow' => true])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg overflow-hidden ' . ($shadow ? 'shadow-md' : '') . ($padding ? ' p-4' : '')]) }}>
    {{ $slot }}
</div>