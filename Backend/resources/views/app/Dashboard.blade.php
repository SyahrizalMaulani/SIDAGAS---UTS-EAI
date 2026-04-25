{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>SIDAGAS</title>
  @vite('resources/css/app.css')

</head>
<body class="isolate">
    <div class="flex h-screen">
        
        -- Sidebar
        @include('app.sidebar.dashboard-sidebar')
        
        <div class="flex flex-1 flex-col">
            <header class="flex h-16 flex-shrink-0 items-center justify-between border-b border-gray-200 bg-white px-4 sm:px-6 lg:px-8">
                <h1 class="text-xl font-bold text-gray-900">Dashboard</h1>
                <div class="flex items-center gap-x-4">
                    <div class="text-right">
                        <p id="waktu-sekarang" class="text-sm font-medium text-gray-800">Today, 01:15</p>
                        <p id="tanggal-sekarang" class="text-xs text-gray-500">Senin, 13 Oktober 2025</p>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User avatar">
                        <span class="text-sm font-semibold text-gray-700">Tom Cook</span>
                    </div>
                </div>
            </header>

            -- Isi Halaman
            <main class="bg-white">
                <div class="p-4 sm:p-6 lg:p-8">
                    <div class="h-100 rounded-lg border-2 border-dashed border-gray-200">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-800">Selamat Datang!</h2>
                            <p class="mt-2 text-gray-600">Ini adalah area konten utama Anda.</p>
                        </div>
                    </div>
                </div>
            </main>
            
        </div>
        </div>


        <script>
            function updateTime() {
                const now = new Date();
                const timeEl = document.getElementById('waktu-sekarang');
                const dateEl = document.getElementById('tanggal-sekarang');
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                timeEl.textContent = `Today, ${hours}:${minutes}`;
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                dateEl.textContent = now.toLocaleDateString('id-ID', options);
            }
            document.addEventListener('DOMContentLoaded', () => {
                updateTime();
                setInterval(updateTime, 60000);
            });
        </script>
</body>
</html> --}}