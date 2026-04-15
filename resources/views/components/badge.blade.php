@props(['type' => 'default', 'icon' => null])

@php
$classes = match($type) {
'stagiaire' => 'bg-gray-100 text-gray-800 border-gray-300',
'coordinateur' => 'bg-blue-100 text-blue-800 border-blue-300',
'manager' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
'vp' => 'bg-purple-100 text-purple-800 border-purple-300',
'cdo' => 'bg-red-100 text-red-800 border-red-300',
'success' => 'bg-pity-light text-pity-dark border-pity',
'warning' => 'bg-shame-light text-shame-dark border-shame',
'danger' => 'bg-failure-light text-failure-dark border-failure',
default => 'bg-gray-100 text-gray-800 border-gray-300'
};
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center space-x-1 px-3 py-1 rounded-full text-xs font-medium border ' . $classes]) }}>
    @if($icon)
    <span class="text-sm">{{ $icon }}</span>
    @endif
    <span>{{ $slot }}</span>
</span>