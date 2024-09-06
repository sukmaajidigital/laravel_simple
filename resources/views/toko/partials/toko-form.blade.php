<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <x-input-label for="nama_toko" :value="__('Nama toko')" />
                <x-text-input id="nama_toko" name="nama_toko" value="{{ old('nama_toko', optional($toko ?? null)->nama_toko) }}" type="text" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('nama_toko')" class="mt-2" />
            </div>
        </div>
    </div>
</section>
