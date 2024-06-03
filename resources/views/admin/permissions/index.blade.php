<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-3/4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end my-6">
                <a href="{{ route('admin.permissions.create') }}"
                    class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md">Create Permission
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $permission->name }}
                                </th>
                                <td class="flex px-6 py-4 text-right">
                                    <div class="flex justify-end">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                class="font-medium bg-blue-600 hover:bg-blue-400 px-4 py-2 rounded-md">Edit</a>
                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium bg-red-600 hover:bg-red-400 px-4 py-2 rounded-md">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
