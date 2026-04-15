@props(['variant' => 'primary', 'size' => 'md', 'type' => 'button'])

@php
$variantClasses = match($variant) {
'primary' => 'bg-linkedout-500 hover:bg-linkedout-600 text-white',
'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800',
'danger' => 'bg-failure hover:bg-failure-dark text-white',
'success' => 'bg-pity hover:bg-pity-dark text-white',
'ghost' => 'bg-transparent hover:bg-gray-100 text-gray-700',
'outline' => 'bg-transparent border-2 border-linkedout-500 text-linkedout-500 hover:bg-linkedout-50',
default => 'bg-linkedout-500 hover:bg-linkedout-600 text-white'
};

$sizeClasses = match($size) {
'sm' => 'px-3 py-1.5 text-xs',
'md' => 'px-4 py-2 text-sm',
'lg' => 'px-6 py-3 text-base',
default => 'px-4 py-2 text-sm'
};
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-linkedout-400 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ' . $variantClasses . ' ' . $sizeClasses]) }}>
    {{ $slot }}
</button>