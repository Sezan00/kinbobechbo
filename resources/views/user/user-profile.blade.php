@extends('layout.header')
@section('content')
<div class="min-h-screen p-6 bg-gray-100">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">

    <!-- Sidebar -->
    <aside class="bg-white shadow rounded-lg p-4 md:col-span-1">
      <h2 class="text-lg font-semibold mb-4">Account Menu</h2>
      <ul class="space-y-2 text-sm">
       
        <li>
          <a href="{{ route('logout') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-red-600">🚪 Logout</a>
        </li>
      </ul>
    </aside>

    <!-- Profile Info -->
    <main class="md:col-span-3 bg-white shadow rounded-lg p-6">
      <h2 class="text-xl font-bold mb-6">👤 My Profile</h2>

      <div class="space-y-4 text-gray-800 text-base">
        <div class="flex items-center gap-2">
          <span class="font-semibold w-32">Name:</span>
          <span>{{$user->name}}</span>
        </div>

        <div class="flex items-center gap-2">
          <span class="font-semibold w-32">Email:</span>
          <span>{{$user->email}}</span>
        </div>

        <div class="flex items-center gap-2">
          <span class="font-semibold w-32">Joined:</span>
          <span> {{ $user->created_at->format('F j, Y') }}</span>
        </div>
      </div>
    </main>

  </div>
</div>


@endsection