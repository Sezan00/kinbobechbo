@extends('layout.header')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-xl">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">💬 Chat with {{ $user->name }}</h2>

    <div id="chatBox" class="border h-64 overflow-y-auto p-4 mb-4 bg-gray-50 rounded space-y-2">
        @foreach($messages as $msg)
            <div class="{{ $msg->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                <p class="inline-block px-4 py-2 rounded-xl 
                    {{ $msg->sender_id == auth()->id() 
                        ? 'bg-blue-500 text-white' 
                        : 'bg-gray-200 text-gray-800' }}">
                    {{ $msg->message }}
                </p>
            </div>
        @endforeach
    </div>

    <form id="chatForm">
        @csrf
        <input type="hidden" id="receiver_id" value="{{ $user->id }}">
        <div class="flex">
            <input 
                type="text" 
                id="message" 
                class="w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-l-lg px-4 py-2 text-gray-800" 
                placeholder="Type your message..."
                autocomplete="off"
            >
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-700 transition text-white px-5 py-2 rounded-r-lg font-semibold">
                Send
            </button>
        </div>
    </form>
</div>

<script>
const chatForm = document.getElementById('chatForm');
const chatBox = document.getElementById('chatBox'); // Where chat show and show receiver chat
const messageInput = document.getElementById('message');
const receiverId = document.getElementById('receiver_id').value;

chatForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const messageText = messageInput.value.trim();
    if (!messageText) return;

    fetch("{{ route('chat.send') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            receiver_id: receiverId,
            message: messageText
        })
    })
    .then(res => res.json())
    .then(msg => {
        const html = `
            <div class="text-right">
                <p class="inline-block px-4 py-2 rounded-xl bg-blue-500 text-white my-1">${msg.message}</p>
            </div>`;
        chatBox.innerHTML += html;
        messageInput.value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
    });
});

// window.Echo.channel(`orders.${this.order.id}`)
//     .listen('OrderShipmentStatusUpdated', (e) => {
//         console.log(e.order.name);
//     });

</script>

@endsection

@push('scripts')
    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof window.Echo !== 'undefined') {
                
                Echo.channel(`user.{{ auth()->user()->id }}`)
                    .listen('.user.chat', (e) => {
                        console.log(e);

                        const html = `
                            <div class="text-left">
                                <p class="inline-block px-4 py-2 rounded-xl 
                                    bg-gray-200 text-gray-800">
                                    ${e.message}
                                </p>
                            </div>`;
                        chatBox.innerHTML += html;
                        
                        chatBox.scrollTop = chatBox.scrollHeight;
                        
                    })
                
            } else {
                console.warn('Echo is not ready yet!');
            }
        });

        
    </script>
@endpush
