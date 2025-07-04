<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
       @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h2>
    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email"
          class="mt-1 w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" />
          @error('email')
              <div class="mt-1 bg-red-100 text-red-700 text-sm px-3 py-2 rounded-lg border border-red-300 flex items-start gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-0.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728" />
                </svg>
                <span>{{ $message }}</span>
                </div>
          @enderror
      </div>

      {{-- password section  --}}

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" 
          class="mt-1 w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" />
          @error('password')
              <div class="mt-1 bg-red-100 text-red-700 text-sm px-3 py-2 rounded-lg border border-red-300 flex items-start gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-0.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728" />
                </svg>
                <span>{{ $message }}</span>
                </div>
          @enderror
      </div>


      <div>
        <button type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300 font-semibold mt-3">
          Sign In
        </button>
      </div>
      <div class="text-sm text-center">
        you can <a href="{{ route('user_signup_page') }}" class="text-blue-700">sign up </a>here
      </div>
    </form>
  </div>

</body>
</html>