<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>{{ $title }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex flex-col min-h-screen bg-white">
  <x-navbar/>
  <main class="flex-grow">
    <div class="relative isolate-z-10 overflow-hidden bg-gradient-to-b from-indigo-100/20 px-6 pt-6 pb-6">
    
    {{ $slot }}

    </div>
    
  </main>

  <x-footer/>
</body>

</html>