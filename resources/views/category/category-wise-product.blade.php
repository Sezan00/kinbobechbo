<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bikroy Style Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-primary { background-color: #169C89; }
    .text-primary { color: #169C89; }
    .hover-bg-primary:hover { background-color: #169C89; }
  </style>
</head>

<body class="bg-gray-100 font-sans">
@php
    $emojiMap = [
        'Mobile-phones' => '📱',
        'Car-sell' => '🚗',
        'Laptop-sell' => '💻',
        'electronics' => '🖥️',
        
    ];
@endphp
  <!-- Header -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-primary">📦 Bikroy Clone</h1>
    @guest
    <div>
        <a href="{{ route('login.view') }}" class="text-primary font-semibold hover:underline">Login</a>
    </div>
    @endguest
    @auth
    <div>
        <a href="{{ route('user.account') }}" class="text-primary font-semibold hover:underline">Account</a>
    </div>
@endauth
  </header>

  <!-- Hero Section -->
  <section class="bg-primary py-16 text-center text-white">
    <h2 class="text-4xl font-bold mb-4">Buy & Sell Anything!</h2>
    <p class="text-lg">Choose your category and explore thousands of ads.</p>
  </section>

  <!-- Categories Section -->
  <section class="max-w-6xl mx-auto py-12 px-4">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Browse Categories <a href="{{ route('product.list') }}" class="text-sm text-blue-400">(All Ads)</a></h3>


    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Example Category Box -->
      @foreach ($categories as $category)
       <a href="{{ route('category_product_ghuest', $category->slug) }}" class="bg-white p-6 rounded shadow hover:bg-[#d3f4ee] transition">
        <div class="text-3xl">  {{ $emojiMap[$category->slug] ?? '📦' }}</div>
        <h4 class="text-lg font-semibold mt-2 text-primary">{{$category->name}}</h4>
      </a>
 @endforeach
      </a>
    </div>
  </section>

</body>
</html>
