<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>Document</title>
        @vite('resources/css/app.css')
      
      </head>
<body>
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  <body class="h-full">
  ```
-->
<div class="mx-auto max-w-3xl py-30 sm:py-30 lg:py-30">
    
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img src="/img/Sponsor.png" alt="Your Company" class="mx-auto h-40 w-auto" />
      <h2 class="mt text-center text-2xl/9 font-bold tracking-tight text-black">Silahkan Masuk Ke Administrator</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

      <form action="#" method="POST" class="space-y-6">
        <div>
          <label for="username" class="block text-sm/6 font-medium text-gray-600">Username</label>
          <div class="mt-2">
            <input id="username" type="username" name="username" required autocomplete="username" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-1 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-600">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-1 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Masuk</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm/6 text-gray-400">
        Ga bisa masuk?
        <a href="wa.me/+6285321899845" class="font-semibold text-indigo-400 hover:text-indigo-300">Hubungi</a>
      </p>
    </div>
  </div>
</body>


</html>