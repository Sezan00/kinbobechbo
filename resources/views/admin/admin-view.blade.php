
@extends('layout.header')
@section('content')
<body class="bg-gray-100 text-gray-800">

  <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md border-r">
      <div class="text-center py-6 text-2xl font-bold text-indigo-600 border-b">
        🔐 Super Admin
      </div>
      <nav class="mt-6 px-4 space-y-2 text-sm font-medium">
        <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-50">📊 Dashboard</a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-50">📂 Categories</a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-50">🏷️ Brands</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-50">📦 Products</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-50">👥 Users</a>
        <a href="{{ route('permisson.list') }}" class="block px-4 py-2 rounded hover:bg-indigo-50">🛡️ Permissions</a>
        <a href="{{ route('roles.list') }}" class="block px-4 py-2 rounded hover:bg-indigo-50">🔐 Roles</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-50">⚙️ Settings</a>
        <a href="#" class="block px-4 py-2 rounded hover:bg-red-100 text-red-500">🚪 Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">

      <!-- Page Title -->
     <div class="flex justify-between items-center mb-6">
  <h1 class="text-3xl font-bold">📊 Dashboard</h1>

  <div class="flex gap-3">
    <a href="{{ route('permission.create') }}">
      <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
        ➕ Create Permission
      </button>
    </a>

    <a href="{{ route('index.role') }}">
      <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition">
        ➕ Create Role
      </button>
    </a>
  </div>
</div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap gap-4 mb-8">
        <a href="{{ route('category_create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">➕ Add Category</a>
        <a href="{{ route('brand.show') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700">➕ Add Brand</a>
        <a href="{{ route('feature_view') }}" class="bg-gray-700 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-800">➕ Add Feature</a>
        <a href="{{ route('category_model_select') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">➕ Add Model</a>
      </div>

      <!-- Stat Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl p-6 shadow text-center">
          <h2 class="text-xl font-semibold mb-1">Total Categories</h2>
          <p class="text-3xl font-bold text-blue-500">12</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow text-center">
          <h2 class="text-xl font-semibold mb-1">Total Brands</h2>
          <p class="text-3xl font-bold text-green-500">8</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow text-center">
          <h2 class="text-xl font-semibold mb-1">Total Products</h2>
          <p class="text-3xl font-bold text-indigo-500">53</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow text-center">
          <h2 class="text-xl font-semibold mb-1">Total Users</h2>
          <p class="text-3xl font-bold text-yellow-500">179</p>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">🧾 Recent Activities</h3>
        <ul class="space-y-3 text-sm">
          <li class="border-b pb-2">👤 Admin created a new permission: <span class="font-medium">edit-posts</span></li>
          <li class="border-b pb-2">🔑 Role <span class="font-medium">Manager</span> was assigned</li>
          <li class="border-b pb-2">📥 10 new users registered today</li>
          <li class="border-b pb-2">⚙️ System settings were updated</li>
        </ul>
      </div>

    </main>

  </div>

@endsection