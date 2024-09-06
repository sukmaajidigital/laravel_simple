<a {{ $attributes->merge(['href' => '#', 'class' => 'inline-flex items-center px-6 py-2 bg-primary-500 border border-transparent rounded-lg font-semibold text-sm text-white focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
