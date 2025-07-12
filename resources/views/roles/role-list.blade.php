@extends('layout.header')
@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
@if (session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 border border-green-300 shadow-md" role="alert">
        <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11.414l-3.707 3.707 1.414 1.414L11 9.414l4.293 4.293 1.414-1.414L11 6.586z" clip-rule="evenodd" />
        </svg>
        <div>
            <span class="font-semibold">Success!</span> {{ session('success') }}
        </div>
    </div>
@endif

  <h1 class="text-3xl font-bold mb-6">Roles List</h1>

  <table class="min-w-full table-auto border-collapse border border-gray-300">
    <thead>
      <tr class="bg-gray-200">
        <th class="border border-gray-300 px-4 py-2 text-left">#</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Role Name</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Permissions</th>
        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>

      </tr>
    </thead>
    <tbody>
      <!-- Example row -->
        @foreach($roles as $role)
          <tr class="hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2">1</td>
            <td class="border border-gray-300 px-4 py-2 font-semibold">{{$role->name }}</td>
            <td class="border border-gray-300 px-4 py-2">
              <ul class="list-disc list-inside space-y-1">
                @foreach ($role->permissions as $permission)
                  <li>{{$permission->name}}</li>
                @endforeach
              </ul>
            </td>
            <td class="px-4 py-2">
        <div class="flex justify-center space-x-2">
            {{-- Delete Button --}}
            <form action="{{ route('delete.role', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this role?')">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="flex items-center gap-1 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Delete
                </button>
            </form>

            {{-- Edit Button --}}
            <a href="{{ route('edit.role', $role->id) }}">
                <button
                    type="button"
                    class="flex items-center gap-1 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5h6M7 9h10M7 15h10M5 19h14M5 5h14" />
                    </svg>
                    Edit
                </button>
            </a>
        </div>
    </td>

      </tr>
  @endforeach
    

      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>

@endsection

<div class="mt-4">
    {{ $roles->links() }}
</div>