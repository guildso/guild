@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md bg-gray-800 border border-gray-700 shadow-sm']) !!}>
