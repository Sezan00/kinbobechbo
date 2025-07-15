<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Super Admin Panel</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-sm border-b">
    <div class="container mx-auto px-4 flex justify-between items-center h-16">
      <!-- Title -->
      <a href="{{ route('admin_view_dashboard') }}">
      <h1 class="text-lg font-semibold tracking-wide text-gray-700">Super Admin Panel</h1>
      </a>
      <!-- Admin Name -->
      <span class="text-sm text-gray-600">{{ Auth::user()->name ?? 'Admin' }}</span>
    </div>
  </header>

  <!-- Main Content -->
  <main class="py-6">
    @yield('content')
  </main>

  <!-- Scripts -->
  @stack('scripts')
</body>
</html>
