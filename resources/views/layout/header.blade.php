<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
       @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="bg-[#169C89]">  
        <div class="max-w-5xl  mx-auto flex-col sm:flex-row flex gap-4 justify-between items-center py-4 px-4">
            <div class="flex gap-4 items-center">
                 <a href="">KinboBechbo</a>
                <span class="text-white font-bold">All Ads</span>
                <span class="text-white border border-gray-300 px-2 py-0.5 rounded shadow-sm">বাংলা </span>
            </div>
            <div class="flex gap-5 items-center">
                <span class="text-white font-bold">💬Chat</span>
                <a href="{{ route('user.account') }}">
                <span class="text-white font-bold">👤Account</span>
                </a>
                <a href="#">
                <button class="text-black font-bold border-2px border-black bg-[#ffc800] px-3 py-2">POST FREE AD</button>
                </a>
            </div>
        </div>
         
    </nav>
    @yield('content')

    @stack('scripts')
</body>
</html>