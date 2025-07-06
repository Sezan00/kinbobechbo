@extends('layout.header')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Your Chats</h2>

    <ul class="space-y-4">
        @forelse($users as $user)
            <li class="border p-3 rounded bg-gray-50 flex justify-between items-center">
                <div>
                    <div class="font-semibold">{{ $user->name }} (ID: {{ $user->id }})</div>
                    <div class="text-sm text-gray-600">
                        {{ $lastMessages[$user->id]->message ?? 'No messages yet' }}
                    </div>
                </div>
                <a href="{{ route('chat.with.user', $user->id) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded">
                   View Chat
                </a>
            </li>
        @empty
            <p>No chats yet.</p>
        @endforelse
    </ul>
</div>
@endsection
