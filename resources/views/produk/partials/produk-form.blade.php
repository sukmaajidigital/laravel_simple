<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <x-input-label for="nama_produk" :value="__('Nama produk')" />
                <x-text-input id="nama_produk" name="nama_produk" value="{{ old('nama_produk', optional($produk ?? null)->nama_produk) }}" type="text" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <x-input-label for="harga" :value="__('Harga Produk (Rupiah)')" />
                <x-text-input id="harga" name="harga" value="{{ old('harga', optional($produk ?? null)->harga) }}" type="number" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>
        </div>
    </div>
</section>
