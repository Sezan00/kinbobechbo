@extends('layout.header')
@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center py-10 px-4">
  <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">✏️ Edit Product</h2>
    @session('success')
	<div class = 'alert-alert' >  {{ session('success') }} </div>
	@endsession

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
      <!-- Title -->
      <div class="mb-5">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Product Title</label>
        <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $product->title }}" placeholder="Enter product title">
      </div>

      <!-- Description -->
      <div class="mb-5">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write product description...">{{ $product->description }}</textarea>
      </div>

      <!-- Price -->
      <div class="mb-5">
        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
        <input type="number" id="price" name="price" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $product->price }}" placeholder="Enter price in ৳">
      </div>

      <!-- Update Button -->
      <div class="mt-6">
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
          Update Product
        </button>
      </div>
    </form>
  </div>
</div>

@endsection