<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Panel Signup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md p-8 border border-gray-200 rounded-xl shadow-md">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Create Panel Account</h2>

    <form action="{{ route('signup.post.panel') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('name')
          <div>{{$message}}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('email')
          <div>{{$message}}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password')
          <div>{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Sign Up</button>
    </form>

    <p class="text-sm text-center text-gray-500 mt-4">
      Already have an account?
      <a href="{{ route('show.login') }}" class="text-blue-600 hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
