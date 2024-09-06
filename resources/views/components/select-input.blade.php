@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full mt-1 border-gray-300 focus:border-primary-600 focus:ring-primary-600 rounded-md shadow-sm']) !!}>
    {{ $slot }}
</select>
