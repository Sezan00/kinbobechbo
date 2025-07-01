<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Brand & Model Upload</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ $category->name }}</h2>
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif
    <form action="{{ route('model.store') }}" method="POST">
        @csrf
      <div class="mb-4">
        <label for="brand" class="block text-gray-700 font-medium mb-2">Select Brand</label>
        <select id="brand" name="brand_id" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-400">
            @foreach ($category->brands as $brand)
          <option value="{{ $brand->id }}">{{$brand->name}}</option>
           @endforeach
        </select>
      </div>

    
      <div class="mb-4">
        <label for="model" class="block text-gray-700 font-medium mb-2">Model Name</label>
        <input type="text" id="model" name="name" placeholder="Enter model name"
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-400">
      </div>

      
      <div>
        <button type="submit"
          class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
      </div>
    </form>
  </div>
</body>
</html>
