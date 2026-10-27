<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nama</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Role</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr class="border-b">
                                <td class="py-2">{{ $u->name }}</td>
                                <td class="py-2">{{ $u->email }}</td>
                                <td class="py-2">{{ $u->role }}</td>
                                <td class="py-2">
                                    @if ($u->id !== auth()->id())
                                        <div class="flex items-center gap-2">
                                            <form method="POST" action="{{ route('admin.users.role', $u) }}" class="flex gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role" class="border rounded text-sm">
                                                    <option value="user" @selected($u->role === 'user')>user</option>
                                                    <option value="admin" @selected($u->role === 'admin')>admin</option>
                                                </select>
                                                <button type="submit" class="px-3 py-1 bg-blue-600 text-white text-sm rounded">Simpan</button>
                                            </form>

                                            <form method="POST" action="{{ route('admin.users.destroy', $u) }}"
                                                  onsubmit="return confirm('Hapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded">Hapus</button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-gray-500 text-sm">(akunmu)</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
