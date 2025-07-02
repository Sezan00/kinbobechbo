@extends('layout.header')
@section('content')

<!-- Alpine.js (for image slider) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="bg-gray-100 min-h-screen py-10 px-4">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">

    <!-- Main Layout -->
    <div class="md:flex md:gap-10">
      
      <!-- Left: Image Slider -->
      <div class="md:w-2/3" x-data="{ current: 0, images: [
        'https://via.placeholder.com/800x500?text=Image+1',
        'https://via.placeholder.com/800x500?text=Image+2',
        'https://via.placeholder.com/800x500?text=Image+3'
      ] }">
        
        <!-- Large Image -->
        <div class="relative mb-4 rounded overflow-hidden">
          <img :src="images[current]" class="w-full h-96 object-cover rounded" alt="Product Image">

          <!-- Prev Button -->
          <button @click="current = current === 0 ? images.length - 1 : current - 1"
            class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-black px-2 py-1 rounded-full shadow">
            ◀
          </button>

          <!-- Next Button -->
          <button @click="current = current === images.length - 1 ? 0 : current + 1"
            class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-black px-2 py-1 rounded-full shadow">
            ▶
          </button>
        </div>

        <!-- Thumbnails -->
        <div class="flex justify-center gap-2 mt-2">
          <template x-for="(img, index) in images" :key="index">
            <img :src="img" @click="current = index"
              class="w-20 h-16 object-cover rounded cursor-pointer border"
              :class="current === index ? 'border-blue-600' : 'border-gray-300'">
          </template>
        </div>
      </div>

      <!-- Right: Product Info -->
      <div class="md:w-1/3 mt-6 md:mt-0">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->title }}</h1>
        <p class="text-green-600 text-xl font-semibold ">{{$product->price}}</p>
        <p class="text-sm mb-4 font-bold">{{$product->negotiable ? 'Negotiable' : 'Fixed' }}</p>

        <div class="text-sm text-gray-700 space-y-1 mb-4">
          <p><strong>Condition:</strong> {{ $product->condition }}</p>
          <p><strong>Brand:</strong> {{$product->brand->name}}</p>
          <p><strong>Model:</strong> {{ $product->model->name ?? 'N/A' }}</p>
       
          <p><strong>Authenticity:</strong> Original</p>
          <p><strong>Location:</strong> Dhaka, Bangladesh</p>
          <p><strong>Status:</strong> Negotiable</p>
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
          <p class="text-sm text-gray-500 mb-1">Seller's Phone Number</p>
          <p class="text-lg font-medium text-blue-700">01712 345 678</p>
        </div>
      </div>
    </div>

    <!-- Features -->
     @if ($product->features->count())
    <div class="mt-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">🔧 Features</h2>
        <ul class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-1 text-gray-700 text-sm list-disc list-inside pl-4">
            @foreach ($product->features as $feature)
                <li>{{ $feature->name }}</li>
            @endforeach
        </ul>
    </div>
@endif
      @if ($product->entities->count())
    <div class="mt-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">💻 Specifications</h2>
        <ul class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-1 text-gray-700 text-sm list-disc list-inside pl-4">
            @foreach ($product->entities as $entity)
                <li><span class="font-medium">{{ $entity->type }}:</span> {{ $entity->value }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <!-- Description -->
    <div class="mt-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-2">📝 Description</h2>
      <p class="text-gray-700 text-sm leading-relaxed">
        {{$product->description}}
      </p>
    </div>

  </div>
</div>


@endsection