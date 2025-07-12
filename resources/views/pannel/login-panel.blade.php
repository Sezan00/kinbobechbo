<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Panel Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md p-8 border border-gray-200 rounded-xl shadow-md">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Panel Login</h2>
    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 border border-green-300 shadow-md" role="alert">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11.414l-3.707 3.707 1.414 1.414L11 9.414l4.293 4.293 1.414-1.414L11 6.586z" clip-rule="evenodd" />
            </svg>
            <div>
                <span class="font-semibold">Success!</span> {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif
    @if (session('Logout'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('Logout') }}
    </div>
    @endif
    <form class="{{ route('login.post') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="flex items-center justify-between mb-6">
        <label class="flex items-center text-sm text-gray-600">
          <input type="checkbox" class="mr-2 rounded border-gray-300"> Remember me
        </label>
        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Login</button>
    </form>

    <p class="text-sm text-center text-gray-500 mt-4">
      Don't have an account?
      <a href="#" class="text-blue-600 hover:underline">Sign up</a>
    </p>
  </div>

</body>
</html>
