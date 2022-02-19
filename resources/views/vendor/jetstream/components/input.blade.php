@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md bg-gray-100 border-gray-200 dark:bg-gray-800 border dark:border-gray-700 shadow-sm']) !!}>
