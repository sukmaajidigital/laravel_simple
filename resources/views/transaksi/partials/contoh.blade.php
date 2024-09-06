<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <!-- Form Produk -->
    <div id="produk-wrapper">
        <div class="produk-form mb-4">
            <x-input-label for="nama_produk" :value="__('Nama Produk')" />
            <x-select-input id="nama_produk_0" name="produk[0][id_produk]" class="nama-produk" onchange="updateHarga(0)">
                <option value="">-- Pilih Produk --</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->nama_produk }}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('produk.0.id_produk')" class="mt-2" />

            <x-input-label for="harga_satuan_0" :value="__('Harga Satuan (Rupiah)')" />
            <x-text-input id="harga_satuan_0" name="produk[0][harga_satuan]" type="number" readonly class="harga-satuan" />
            <x-input-error :messages="$errors->get('produk.0.harga_satuan')" class="mt-2" />

            <x-input-label for="jumlah_0" :value="__('Jumlah')" />
            <x-text-input id="jumlah_0" name="produk[0][jumlah]" type="number" class="jumlah" oninput="updateSubHarga(0)" />
            <x-input-error :messages="$errors->get('produk.0.jumlah')" class="mt-2" />

            <x-input-label for="sub_harga_0" :value="__('Sub Harga (Rupiah)')" />
            <x-text-input id="sub_harga_0" name="produk[0][sub_harga]" type="number" readonly class="sub-harga" />
            <x-input-error :messages="$errors->get('produk.0.sub_harga')" class="mt-2" />
        </div>
    </div>

    <!-- Tombol Tambah Produk -->
    <x-secondary-button type="button" onclick="tambahProduk()">+ Tambah Produk</x-secondary-button>

    <!-- Total Harga -->
    <div class="mt-4">
        <x-input-label for="total_harga" :value="__('Total Harga (Rupiah)')" />
        <x-text-input id="total_harga" name="total_harga" type="number" readonly class="block w-full" />
    </div>

    <!-- Tombol Submit -->
    <section class="p-4 sm:p-8 bg-white shadow rounded-lg mt-4">
        <div class="flex flex-row gap-4 justify-end w-full">
            <x-secondary-button onclick="window.history.back();">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button type="submit">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </section>
</form>

<script>
    let produkCount = 1;

    function updateHarga(index) {
        const selectedProduct = document.querySelector(`#nama_produk_${index}`);
        const hargaSatuan = selectedProduct.options[selectedProduct.selectedIndex].getAttribute('data-harga');
        document.querySelector(`#harga_satuan_${index}`).value = hargaSatuan;
        updateSubHarga(index);
    }

    function updateSubHarga(index) {
        const hargaSatuan = document.querySelector(`#harga_satuan_${index}`).value;
        const jumlah = document.querySelector(`#jumlah_${index}`).value;
        const subHarga = hargaSatuan * jumlah;
        document.querySelector(`#sub_harga_${index}`).value = subHarga;
        updateTotalHarga();
    }

    function updateTotalHarga() {
        let totalHarga = 0;
        document.querySelectorAll('.sub-harga').forEach(function(subHargaInput) {
            totalHarga += parseFloat(subHargaInput.value || 0);
        });
        document.querySelector('#total_harga').value = totalHarga;
    }

    function tambahProduk() {
        const produkWrapper = document.querySelector('#produk-wrapper');
        const newForm = `
            <div class="produk-form mb-4">
                <x-input-label for="nama_produk_${produkCount}" :value="__('Nama Produk')" />
                <x-select-input id="nama_produk_${produkCount}" name="produk[${produkCount}][id_produk]" class="nama-produk" onchange="updateHarga(${produkCount})">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </x-select-input>

                <x-input-label for="harga_satuan_${produkCount}" :value="__('Harga Satuan (Rupiah)')" />
                <x-text-input id="harga_satuan_${produkCount}" name="produk[${produkCount}][harga_satuan]" type="number" readonly class="harga-satuan" />

                <x-input-label for="jumlah_${produkCount}" :value="__('Jumlah')" />
                <x-text-input id="jumlah_${produkCount}" name="produk[${produkCount}][jumlah]" type="number" class="jumlah" oninput="updateSubHarga(${produkCount})" />

                <x-input-label for="sub_harga_${produkCount}" :value="__('Sub Harga (Rupiah)')" />
                <x-text-input id="sub_harga_${produkCount}" name="produk[${produkCount}][sub_harga]" type="number" readonly class="sub-harga" />
            </div>
        `;
        produkWrapper.insertAdjacentHTML('beforeend', newForm);
        produkCount++;
    }
</script>

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <!-- Form Produk -->
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div id="produk-wrapper">
                <div class="produk-form flex flex-row gap-2 mb-2">
                    <div class="flex-auto">
                        <x-input-label for="nama_produk" :value="__('Nama Produk')" />
                        <x-select-input id="nama_produk_0" name="produk[0][id_produk]" class="nama-produk" onchange="updateHarga(0)">
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-error :messages="$errors->get('produk.0.id_produk')" class="mt-2" />
                    </div>
                    <div class="flex-auto">
                        <x-input-label for="harga_satuan_0" :value="__('Harga Satuan (Rupiah)')" />
                        <x-text-input id="harga_satuan_0" name="produk[0][harga_satuan]" type="number" readonly class="harga-satuan" />
                        <x-input-error :messages="$errors->get('produk.0.harga_satuan')" class="mt-2" />
                    </div>
                    <div class="flex-auto">
                        <x-input-label for="jumlah_0" :value="__('Jumlah')" />
                        <x-text-input id="jumlah_0" name="produk[0][jumlah]" type="number" class="jumlah" oninput="updateSubHarga(0)" />
                        <x-input-error :messages="$errors->get('produk.0.jumlah')" class="mt-2" />
                    </div>
                    <div class="flex-auto">
                        <x-input-label for="sub_harga_0" :value="__('Sub Harga (Rupiah)')" />
                        <x-text-input id="sub_harga_0" name="produk[0][sub_harga]" type="number" readonly class="sub-harga" />
                        <x-input-error :messages="$errors->get('produk.0.sub_harga')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah Produk -->
    <x-secondary-button type="button" class="mt-4" onclick="tambahProduk()">+ Tambah Produk</x-secondary-button>

    <!-- Total Harga -->
    <div class="mt-4">
        <x-input-label for="total_harga" :value="__('Total Harga (Rupiah)')" />
        <x-text-input id="total_harga" name="total_harga" type="number" readonly class="block w-full" />
    </div>

    <!-- Tombol Submit -->
    <section class="p-4 sm:p-8 bg-white shadow rounded-lg mt-4">
        <div class="flex flex-row gap-4 justify-end w-full">
            <x-secondary-button onclick="window.history.back();">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button type="submit">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </section>
</form>

<script>
    let produkCount = 1;

    function updateHarga(index) {
        const selectedProduct = document.querySelector(`#nama_produk_${index}`);
        const hargaSatuan = selectedProduct.options[selectedProduct.selectedIndex].getAttribute('data-harga');
        document.querySelector(`#harga_satuan_${index}`).value = hargaSatuan;
        updateSubHarga(index);
    }

    function updateSubHarga(index) {
        const hargaSatuan = document.querySelector(`#harga_satuan_${index}`).value;
        const jumlah = document.querySelector(`#jumlah_${index}`).value;
        const subHarga = hargaSatuan * jumlah;
        document.querySelector(`#sub_harga_${index}`).value = subHarga;
        updateTotalHarga();
    }

    function updateTotalHarga() {
        let totalHarga = 0;
        document.querySelectorAll('.sub-harga').forEach(function(subHargaInput) {
            totalHarga += parseFloat(subHargaInput.value || 0);
        });
        document.querySelector('#total_harga').value = totalHarga;
    }

    function tambahProduk() {
        const produkWrapper = document.querySelector('#produk-wrapper');
        const newForm = `
            <div class="produk-form flex flex-row gap-2 mb-2">
                <div class="flex-auto">
                    <x-input-label for="nama_produk_${produkCount}" :value="__('Nama Produk')" />
                    <x-select-input id="nama_produk_${produkCount}" name="produk[${produkCount}][id_produk]" class="nama-produk" onchange="updateHarga(${produkCount})">
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->nama_produk }}</option>
                        @endforeach
                    </x-select-input>
                </div>
                <div class="flex-auto">
                    <x-input-label for="harga_satuan_${produkCount}" :value="__('Harga Satuan (Rupiah)')" />
                    <x-text-input id="harga_satuan_${produkCount}" name="produk[${produkCount}][harga_satuan]" type="number" readonly class="harga-satuan" />
                </div>
                <div class="flex-auto">
                    <x-input-label for="jumlah_${produkCount}" :value="__('Jumlah')" />
                    <x-text-input id="jumlah_${produkCount}" name="produk[${produkCount}][jumlah]" type="number" class="jumlah" oninput="updateSubHarga(${produkCount})" />
                </div>
                <div class="flex-auto">
                    <x-input-label for="sub_harga_${produkCount}" :value="__('Sub Harga (Rupiah)')" />
                    <x-text-input id="sub_harga_${produkCount}" name="produk[${produkCount}][sub_harga]" type="number" readonly class="sub-harga" />
                </div>
            </div>
        `;
        produkWrapper.insertAdjacentHTML('beforeend', newForm);
        produkCount++;
    }
</script>
<form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi->id) : route('transaksi.store') }}" method="POST">
    @csrf
    @if (isset($transaksi))
        @method('PUT')
    @endif

    <!-- Form Produk -->
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div id="produk-wrapper">
                @foreach (old('produk', $transaksi->detailTransaksi ?? [[]]) as $index => $detail)
                    <div class="produk-form flex flex-row gap-2 mb-2">
                        <div class="flex-auto">
                            <x-input-label for="nama_produk" :value="__('Nama Produk')" />
                            <x-select-input id="nama_produk_{{ $index }}" name="produk[{{ $index }}][id_produk]" class="nama-produk" onchange="updateHarga({{ $index }})">
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}" {{ old("produk.$index.id_produk", $detail->id_produk ?? '') == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama_produk }}
                                    </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('produk.' . $index . '.id_produk')" class="mt-2" />
                        </div>
                        <div class="flex-auto">
                            <x-input-label for="harga_satuan_{{ $index }}" :value="__('Harga Satuan (Rupiah)')" />
                            <x-text-input id="harga_satuan_{{ $index }}" name="produk[{{ $index }}][harga_satuan]" type="number" readonly class="harga-satuan" value="{{ old("produk.$index.harga_satuan", $detail->harga_satuan ?? 0) }}" />
                            <x-input-error :messages="$errors->get('produk.' . $index . '.harga_satuan')" class="mt-2" />
                        </div>
                        <div class="flex-auto">
                            <x-input-label for="jumlah_{{ $index }}" :value="__('Jumlah')" />
                            <x-text-input id="jumlah_{{ $index }}" name="produk[{{ $index }}][jumlah]" type="number" class="jumlah" oninput="updateSubHarga({{ $index }})" value="{{ old("produk.$index.jumlah", $detail->jumlah ?? 1) }}" />
                            <x-input-error :messages="$errors->get('produk.' . $index . '.jumlah')" class="mt-2" />
                        </div>
                        <div class="flex-auto">
                            <x-input-label for="sub_harga_{{ $index }}" :value="__('Sub Harga (Rupiah)')" />
                            <x-text-input id="sub_harga_{{ $index }}" name="produk[{{ $index }}][sub_harga]" type="number" readonly class="sub-harga" value="{{ old("produk.$index.sub_harga", $detail->sub_harga ?? 0) }}" />
                            <x-input-error :messages="$errors->get('produk.' . $index . '.sub_harga')" class="mt-2" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Tombol Tambah Produk -->
    <x-secondary-button type="button" class="mt-4" onclick="tambahProduk()">+ Tambah Produk</x-secondary-button>

    <!-- Total Harga -->
    <div class="mt-4">
        <x-input-label for="total_harga" :value="__('Total Harga (Rupiah)')" />
        <x-text-input id="total_harga" name="total_harga" type="number" readonly class="block w-full" value="{{ old('total_harga', $transaksi->total_harga ?? 0) }}" />
    </div>

    <!-- Tombol Submit -->
    <section class="p-4 sm:p-8 bg-white shadow rounded-lg mt-4">
        <div class="flex flex-row gap-4 justify-end w-full">
            <x-secondary-button onclick="window.history.back();">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button type="submit">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </section>
</form>

<script>
    // Sama seperti sebelumnya: updateHarga, updateSubHarga, updateTotalHarga, tambahProduk
</script>
