<x-layout-web :title="$title">
        
{{-- Div Judul --}}
<div class="mx-auto max-w-7xl px-4 py-20 sm:py-10 lg:px-8"> 
  <div class="mx-auto items-center mt-16 max-w-2xl lg:mx-0 lg:mt-20 lg:grid lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-x-16 lg:gap-y-6">
    
    <div class="max-w-xl lg:mt-0">
      <h1 class="max-w-2xl text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Syahrizal Galon - Melayani Setulus Hati</h1>
      <p class="text-lg leading-8 text-gray-600 py-5">
        Syahrizal Galon adalah perusahaan dagang yang berdiri di Desa Ilir, Kec Kandanghaur, Kabupaten Indramayu, berkomitmen menyediakan 
        <strong> galon murni dari mata air Gunung Ciremai </strong> dan <strong> gas LPG bersubsidi</strong> 
        sebagai solusi kebutuhan dasar masyarakat sekitar. Kami percaya bahwa air bersih dan energi masak yang terjangkau adalah hak setiap rumah tangga.</p>
                        
        {{-- CTA --}}
        <div class="mt-6 flex items-center gap-x-4">
          <a href="#" class="rounded-md bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Pesan Sekarang</a>
          <a href="#" class="flex items-center gap-x-2 rounded-md bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12.04 2.012c-5.52 0-9.99 4.47-9.99 9.99 0 1.77.46 3.44 1.28 4.91l-1.28 4.67 4.78-1.25c1.43.79 3.03 1.22 4.71 1.22h.01c5.52 0 9.99-4.47 9.99-9.99s-4.47-9.99-9.99-9.99zm5.34 12.3c-.28.51-1.04.93-1.43 1.04-.39.11-.84.15-1.29.04-.45-.11-.93-.26-1.39-.47-.46-.21-1.04-.6-1.9-1.32-.86-.72-1.57-1.57-2.12-2.53-.55-.96-.86-1.95-.86-2.98 0-1.03.31-1.95.86-2.53.55-.58 1.21-.89 1.9-.89h.28c.31 0 .59.1.81.28.22.18.34.43.39.72l.21 1.21c.05.28.02.56-.09.81-.11.25-.3.46-.56.63-.26.17-.5.3-.72.43-.22.13-.39.26-.5.41-.11.15-.17.3-.17.46 0 .16.05.31.15.46.1.15.26.34.46.55.2.21.43.43.69.66.26.23.51.43.76.6.25.17.46.28.63.34.17.06.31.09.43.09.16 0 .31-.02.43-.06.12-.04.25-.1.36-.17.11-.07.23-.15.34-.23.11-.08.23-.15.36-.21.13-.06.26-.1.41-.1.15 0 .3.02.43.06.13.04.26.1.39.17.13.07.25.15.36.23.11.08.22.17.31.28.09.11.17.22.23.34.06.12.09.25.09.39 0 .15-.02.3-.06.43zm-6.03-9.52c-.17 0-.34.06-.46.17-.12.11-.19.26-.19.43s.07.31.19.43c.12.11.28.17.46.17.17 0 .34-.06.46-.17.12-.11.19-.26.19-.43s-.07-.31-.19-.43c-.12-.11-.28-.17-.46-.17zm-1.25 2.5c-.17 0-.34.06-.46.17-.12.11-.19.26-.19.43s.07.31.19.43c.12.11.28.17.46.17.17 0 .34-.06.46-.17.12-.11.19-.26.19-.43s-.07-.31-.19-.43c-.12-.11-.28-.17-.46-.17zm2.5 0c-.17 0-.34.06-.46.17-.12.11-.19.26-.19.43s.07.31.19.43c.12.11.28.17.46.17.17 0 .34-.06.46-.17.12-.11.19-.26.19-.43s-.07-.31-.19-.43c-.12-.11-.28-.17-.46-.17z"/>
            </svg>
            WhatsApp
          </a>
        </div>

        {{-- Badge Customer --}}
        
    </div>
    <img src="/img/toko.png" alt="Brandenburg Gate in Germany" class="mt-10 aspect-[6/5] w-full max-w-lg rounded-2xl object-cover sm:mt-10 lg:mt-0 lg:max-w-none">
        
  </div>
</div>
{{-- Akhir Div Judul --}}


{{-- page nilai - nilai --}}

<div class="bg-white sm:py-2 text-center">

  <div class="bg-indigo-50 border-indigo-600 p-4 shadow-sm inline-block rounded">
            <div class="flex items-center">
                <svg class="h-10 w-10 text-indigo-600 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div>
                    <p class="text-sm font-semibold text-indigo-800 uppercase tracking-wide">Telah Dipercaya Oleh</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $customerCount ?? 0 }} Pelanggan Setia</p>
                </div>
            </div>
        </div>

  <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-10">
    
    <div class="mx-auto max-w-2xl lg:text-center">
      <h2 class="text-base font-semibold leading-7 text-indigo-600">Nilai-Nilai Kami</h2>
        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Syahrizal Galon Pilihan Terbaik Bagi Anda</p>
        <p class="mt-6 text-lg leading-8 text-gray-600">Kami bekerja berdasarkan nilai-nilai inti yang memastikan kualitas, kepercayaan, dan kepuasan Anda selalu menjadi prioritas utama, 
        <strong> Kami Melayani Setulus Hati</strong>.</p>
    </div>
              
              {{-- grid untuk point point --}}
              <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="mt-16 flex flex-wrap justify-center gap-y-16 gap-x-8">

                 {{-- point kualitas --}}
                <div class="flex flex-col basis-full md:basis-[45%] lg:basis-[30%]">
                    <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                        Kualitas Terjamin
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Air galon dari sumber mata air gunung ciremai dan gas asli bersubsidi terjamin keasliannya</p>
                    </dd>
                </div>

                {{-- Point Kejujuran --}}
                <div class="flex flex-col basis-full md:basis-[45%] lg:basis-[30%]">
                    <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1.25a1 1 0 00-.88.5l-1.5 2.5a1 1 0 01-1.74 0l-1.5-2.5a1 1 0 00-.88-.5H4a1 1 0 01-1-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                            <path d="M10 12.5a1.5 1.5 0 013 0V13a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1.25a1 1 0 00-.88.5l-1.5 2.5a1 1 0 01-1.74 0l-1.5-2.5a1 1 0 00-.88-.5H4a1 1 0 01-1-1v-3a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                        </svg>
                    </div>
                        Kejujuran
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Kami beroperasi dengan transparansi penuh. Takaran yang pas, harga yang jujur, dan tidak ada biaya tersembunyi. Kepercayaan Anda adalah aset utama kami.</p>
                    </dd>
                </div>

                {{-- Point Harga Terjangkau --}}
                <div class="flex flex-col basis-full md:basis-[45%] lg:basis-[30%]">
                    <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h13.5A2.25 2.25 0 0019 13.75v-7.5A2.25 2.25 0 0016.75 4H3.25zM10 6a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 6zm0 4a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 10zM13 6a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0113 6zm0 4a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0113 10zM7 6a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 017 6zm0 4a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 017 10z" />
                        </svg>
                    </div>
                        Harga Terjangkau
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Menyediakan kebutuhan pokok berkualitas dengan harga yang kompetitif dan ramah di kantong masyarakat.</p>
                    </dd>
                </div>

                {{-- Point Pelayanan Ramah --}}
                <div class="flex flex-col basis-full md:basis-[45%] lg:basis-[30%]">
                    <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.095a1.23 1.23 0 00.41-1.412A9.99 9.99 0 0010 12c-2.31 0-4.438.784-6.131 2.095z" />
                        </svg>
                    </div>
                        Pelayanan Ramah
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Setiap interaksi, dari pemesanan hingga pengantaran, kami Melayani Setulus Hati.</p>
                    </dd>
                </div>

                {{-- Point Pengiriman Cepat & Tepat --}}
                <div class="flex flex-col basis-full md:basis-[45%] lg:basis-[30%]">
                    <dt class="flex items-center gap-x-3 text-lg font-semibold leading-7 text-gray-900">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-600">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                        </svg>
                    </div>
                        Pengiriman Cepat & Tepat
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Kami menghargai waktu Anda. Pesanan diantar sesuai jadwal yang dijanjikan, langsung ke depan pintu rumah Anda.</p>
                    </dd>
                </div>

          
                </dl>
              </div>
              
            </div>
          </div>


        {{-- Tim --}}
        <div class="bg-white py-24 sm:py-32">
          <div cclass="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto max-w-2xl lg:text-center">
              <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Tim Kami</h2>
              <p class="mt-6 text-lg leading-8 text-gray-600">Kami adalah tim yang berdedikasi untuk memastikan kebutuhan air minum dan energi masak Anda terpenuhi setiap hari.</p>
            </div>

            <ul role="list" class="mt-16 flex flex-wrap justify-center gap-y-16 gap-x-8">
              <li>
                <div class="flex items-center gap-x-6">
                  <img class="h-16 w-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Foto anggota tim">
                  <div>
                    <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">H. Sakim, S.E, M.A.P</h3>
                    <p class="text-sm font-semibold leading-6 text-indigo-600">CEO</p>
                  </div>
                </div>
              </li>
        
              <li>
                <div class="flex items-center gap-x-6">
                  <img class="h-16 w-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Foto anggota tim">
                  <div>
                    <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Hj. Astuti, S.Pd.I</h3>
                    <p class="text-sm font-semibold leading-6 text-indigo-600">COO</p>
                  </div>
                </div>
              </li>
        
               <li>
                <div class="flex items-center gap-x-6">
                  <img class="h-16 w-16 rounded-full object-cover" src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Foto anggota tim">
                  <div>
                    <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Syahrizal Maulani</h3>
                    <p class="text-sm font-semibold leading-6 text-indigo-600">CTO</p>
                  </div>
                </div>
              </li>

            </ul>

          </div>
        </div>


</x-layout-web>