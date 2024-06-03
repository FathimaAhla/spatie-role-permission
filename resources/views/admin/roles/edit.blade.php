<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-3/4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex my-6">
                <a href="{{ route('admin.roles.index') }}"
                    class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md">Back
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="max-w-sm mx-auto p-8" action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $role->name }}" required />
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-400 font-medium rounded-md text-sm w-full sm:w-auto px-4 py-2 text-center">Update</button>
                </form>
            </div>
            <div class="mt-6 p-2">
                <h3 class="text-lg font-semibold text-gray-800">Role Permissions</h3>
                <div class="flex flex-wrap">
                    @if ($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            <div class="flex space-x-2 bg-gray-100 text-gray-800 px-4 py-2 rounded-md mr-2 mb-2">
                                <form action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" method="POST"
                                    onclick="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $role_permission->name}}</button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <form class="max-w-sm mx-auto p-8" action="{{ route('admin.roles.permissions', $role->id) }}"
                        method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900">Select a Permission</label>
                            <select id="permission" name="permission"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2">
                                <option selected>Choose a Permission</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-400 font-medium rounded-md text-sm w-full sm:w-auto px-4 py-2 text-center">Assign Permission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
