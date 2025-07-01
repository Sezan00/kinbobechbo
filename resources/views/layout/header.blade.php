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
                <span class="text-white font-bold">Bangla</span>
            </div>
            <div class="flex gap-5">
                <span class="text-white font-bold">💬Chat</span>
                <span class="text-white font-bold">👤Account</span>
            </div>
        </div>
         
    </nav>
    @yield('content')

    @stack('scripts')
</body>
</html>