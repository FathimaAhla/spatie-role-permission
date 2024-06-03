<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-3/4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex my-6">
                <a href="{{ route('admin.permissions.index') }}"
                    class="px-4 py-2 bg-green-600 hover:bg-green-400 rounded-md">Back
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="max-w-sm mx-auto p-8" action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
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
                        class="text-white bg-blue-600 hover:bg-blue-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
