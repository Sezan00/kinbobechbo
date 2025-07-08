@extends('layout.header')
@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        @auth
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <aside class="bg-white shadow rounded-lg p-4 md:col-span-1">
                <h2 class="text-lg font-semibold mb-4">Account Menu</h2>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('user.profile') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">👤 My Profile</a>
                    </li>
                    <li>
                        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">📦 My Products</a>
                    </li>
                    <li>
                        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">⚙️ Settings</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-red-600">🚪 Logout</a>
                    </li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="md:col-span-3 bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-bold mb-6">My Uploaded Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Dummy Product -->
                    @foreach ($products as $product)
                        
                   <a href="{{ route('product.show', $product->id) }}">
                    <div class="border rounded-lg shadow-sm p-4">
                        <img src="{{ asset($product->image) }}" class="w-full h-40 object-cover rounded" alt="Product">
                        <h3 class="mt-2 font-semibold text-lg">{{ $product->title }}</h3>
                        <p class="text-sm text-gray-600">{{Str::limit($product->description, 30)}}</p>
                        <p class="text-blue-600 font-bold mt-1">{{$product->price}}</p>
                    </div>
                    </a>
                    @endforeach
                    
                  

                </div>
            </main>
        </div>
        @else
        <!-- Not Logged In -->
        <div class="flex items-center justify-center min-h-[70vh]">
            <div class="text-center border border-red-200 rounded-lg p-6 shadow-md max-w-xl w-full bg-white">
                <div class="text-2xl text-red-600 font-semibold mb-3">⚠️ Access Required</div>
                <p class="text-gray-700 text-base mb-5">
                    You need to 
                    <a href="{{ route('login.view') }}" class="text-blue-600 font-medium underline hover:text-blue-800">Login</a> 
                    or 
                    <a href="{{ route('user_signup_page') }}" class="text-blue-600 font-medium underline hover:text-blue-800">Sign Up</a> 
                    to access your account.
                </p>
            </div>
        </div>
        @endauth
    </div>
</div>


@endsection