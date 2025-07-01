<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md border-r">
      <div class="text-center py-6 text-2xl font-bold text-blue-600 border-b">
        Admin Panel
      </div>
      <nav class="mt-6 px-4 space-y-2">
        <a href="dashboard.html" class="block px-4 py-2 rounded hover:bg-blue-50">📊 Dashboard</a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50">📂 Categories</a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-blue-50">🏷️ Brands</a>
        <a href="product-list.html" class="block px-4 py-2 rounded hover:bg-blue-50">📦 Products</a>
        <a href="users.html" class="block px-4 py-2 rounded hover:bg-blue-50">👥 Users</a>
        <a href="login.html" class="block px-4 py-2 rounded hover:bg-red-100 text-red-500">🚪 Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <!-- Page Title -->
      <h1 class="text-3xl font-bold mb-6">📊 Dashboard</h1>

      <!-- Action Buttons -->
      <div class="flex justify-end mb-6 space-x-4">
        <a href="{{ route('category_create') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
          ➕ Add Category
        </a>
        <a href="{{ route('brand.show') }}"
           class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200">
          ➕ Add Brand
        </a>
        <a href="{{ route('feature_view') }}"
        class="bg-gray-700 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-800 transition duration-200">
         ➕ Add Feature
        </a>
        <a href="{{ route('category_model_select') }}"
        class="bg-red-500 text-white px-5 py-2 rounded-lg shadow hover:bg-red-800 transition duration-200">
         ➕ Add Model
        </a>
      </div>

      <!-- Stat Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
      </div>
    </main>

  </div>

</body>
</html>
