<x-layout-web :title="$title">
    
    <div class="bg-white" x-data="orderForm()">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center mb-10">Katalog Produk Kami</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
          
          @if(isset($products) && count($products) > 0)
            @foreach($products as $product)
            <div class="group relative bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col overflow-hidden">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-t-md bg-gray-100 lg:aspect-none lg:h-64 flex items-center justify-center p-4">
                  @php
                      $name = strtolower($product['name']);
                      $imagePath = '/galon.jpeg';
                      if(str_contains($name, '3 kg') || str_contains($name, '3kg')) $imagePath = 'img/gas.jpg';
                      elseif(str_contains($name, '5 kg') || str_contains($name, '5kg') || str_contains($name, '5.5')) $imagePath = 'img/gasLPG5Kg.jpeg';
                      elseif(str_contains($name, 'aqua')) $imagePath = 'img/GalonAqua.jpeg';
                      elseif(str_contains($name, 'isi ulang') || $name === 'galon') $imagePath = 'img/galon.jpeg';
                  @endphp
                  {{-- Catatan: Pastikan copy gambar dari Next.js /public ke Laravel /public --}}
                  <img src="{{ $imagePath }}" alt="{{ $product['name'] }}" class="h-full w-full object-contain object-center group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="flex flex-1 flex-col p-4 justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">
                            {{ $product['name'] }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Sisa Stok: <span class="font-semibold text-indigo-600">{{ $product['stock'] }}</span></p>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <p class="text-xl font-bold text-gray-900">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                    </div>
                    <div class="mt-6">
                        <button @click="openModal({{ $product['id'] }}, '{{ addslashes($product['name']) }}', {{ $product['price'] }}, {{ $product['stock'] }})" class="relative flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-2 text-sm font-medium text-white hover:bg-indigo-700 w-full z-10 cursor-pointer">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
          @else
            <div class="col-span-full text-center py-10">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">Tidak ada produk</h3>
                <p class="mt-1 text-sm text-gray-500">Gagal mengambil data produk dari server atau stok sedang kosong.</p>
            </div>
          @endif
          
        </div>
      </div>

      {{-- Modal Pop-up Order --}}
      <div x-show="showModal" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
        <!-- Background overlay -->
        <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div x-show="showModal" x-transition @click.away="showModal = false" class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
              
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Konfirmasi Pesanan</h3>
                  
                  <template x-if="product">
                    <div class="mt-4 bg-gray-50 p-4 rounded-md">
                      <p class="font-bold text-gray-900 text-lg" x-text="product.name"></p>
                      <p class="text-sm text-gray-500 mt-1">Harga: Rp <span x-text="formatRupiah(product.price)"></span> / item</p>
                      <p class="text-sm text-gray-500">Sisa Stok: <span class="font-semibold" x-text="product.stock"></span></p>
                      
                      <div class="mt-4 flex items-center gap-4">
                        <label for="qty" class="text-sm font-medium leading-6 text-gray-900">Jumlah:</label>
                        <input type="number" id="qty" x-model.number="qty" min="1" :max="product.stock" class="block w-24 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                      </div>

                      <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between items-center">
                        <span class="text-gray-700 font-medium">Total Pembayaran:</span>
                        <span class="text-xl font-bold text-indigo-600">Rp <span x-text="formatRupiah(product.price * qty)"></span></span>
                      </div>
                    </div>
                  </template>

                  <!-- Status Messages -->
                  <template x-if="error">
                    <div class="mt-4 rounded-md bg-red-50 p-4">
                      <div class="flex">
                        <div class="ml-3">
                          <h3 class="text-sm font-medium text-red-800" x-text="error"></h3>
                        </div>
                      </div>
                    </div>
                  </template>

                  <template x-if="success">
                    <div class="mt-4 rounded-md bg-green-50 p-4">
                      <div class="flex">
                        <div class="ml-3">
                          <h3 class="text-sm font-medium text-green-800">Pesanan berhasil dibuat! Halaman akan dimuat ulang...</h3>
                        </div>
                      </div>
                    </div>
                  </template>

                </div>
              </div>
              <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <button type="button" @click="submitOrder()" :disabled="loading || success" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto disabled:opacity-50">
                  <span x-show="!loading">Konfirmasi Pesanan</span>
                  <span x-show="loading">Memproses...</span>
                </button>
                <button type="button" @click="showModal = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batalkan</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('orderForm', () => ({
                showModal: false,
                product: null,
                qty: 1,
                loading: false,
                error: '',
                success: false,
                
                openModal(id, name, price, stock) {
                    if(stock < 1) {
                        alert("Maaf, stok produk ini sedang kosong.");
                        return;
                    }
                    this.product = { id, name, price, stock };
                    this.qty = 1;
                    this.showModal = true;
                    this.success = false;
                    this.error = '';
                },

                formatRupiah(angka) {
                    return new Intl.NumberFormat('id-ID').format(angka);
                },
                
                async submitOrder() {
                    if (this.qty < 1 || this.qty > this.product.stock) {
                        this.error = 'Jumlah pesanan tidak valid! Maksimal ' + this.product.stock;
                        return;
                    }
                    
                    this.loading = true;
                    this.error = '';
                    
                    try {
                        const response = await fetch('http://127.0.0.1:8005/orders', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                product_id: this.product.id,
                                qty: parseInt(this.qty)
                            })
                        });
                        
                        const data = await response.json();
                        
                        if (!response.ok) {
                            throw new Error(data.detail || 'Terjadi kesalahan saat memesan');
                        }
                        
                        this.success = true;
                        
                        // Tutup modal dan reload untuk perbarui stok
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                        
                    } catch (err) {
                        this.error = err.message || 'Gagal menghubungi server.';
                    } finally {
                        this.loading = false;
                    }
                }
            }))
        })
    </script>
</x-layout-web>