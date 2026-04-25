<x-layout-web :title="$title">

      {{-- Alert Informasi User --}}
      <div class="rounded-md bg-yellow-50">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-lg font-medium text-yellow-800">Informasi</h3>
            <div class="mt-2 text-sm text-yellow-700">
              <p>Bagi Pelanggan Terhormat, Saat Ini Website Pengguna Masih dalam <strong> pengembangan </strong>, Terimakasih sudah mengerti kondisi kami. Sementara Waktu Bagi Pelanggan Untuk Oeder Kami alihkan dahulu
              <a href="#" class="text-lg font-semibold text-gray">Via WhatsApp <span aria-hidden="true">→</span></a></p>
              <p>Untuk saat ini hanya tersedia bagi Administrator</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Selamat Datang --}}
      <div class="mx-auto max-w-3xl py-30 sm:py-30 lg:py-30"> 

        <div class="text-center">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-black sm:text-7xl">Selamat Datang di {{ $title }}</h1>
          <h4 class="text-5xl font-semibold tracking-tight text-balance text-black sm:text-4xl">Sistem Informasi Dagang Syahrizal Galon</h4>
          <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
            {{ $title }} sebagai sistem untuk mengelola seluruh aktivitas usaha Syahrizal Galon mulai dari pencatatan pesanan, transaksi, stok produk, hingga program hadiah pelanggan. Dengan sistem yang terintegrasi dan mudah digunakan.</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/login" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Masuk</a>
            <a href="#" class="text-sm/6 font-semibold text-gray">Pelajari <span aria-hidden="true">→</span></a>
          </div>
        </div>
        
      </div>

</x-layout-web>