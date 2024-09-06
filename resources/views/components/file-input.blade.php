@props(['disabled' => false])

<div class="relative">
    <!-- Icon Folder -->
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M2 4a2 2 0 012-2h5.172a2 2 0 011.414.586l1.828 1.828A2 2 0 0013.828 5H18a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V4z" />
        </svg>
    </div>

    <!-- Input File -->
    <input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'border-gray-300 focus:border-primary-600 focus:ring-primary-600 rounded-md shadow-sm pl-10 py-2',
    ]) !!}>
</div>
