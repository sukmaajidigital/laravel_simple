<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-row gap-4 justify-end w-full">
        <x-secondary-button onclick="window.history.back();">
            {{ __('Cancel') }}
        </x-secondary-button>
        <x-primary-button type="submit">
            {{ __('Save') }}
        </x-primary-button>
    </div>
</section>
