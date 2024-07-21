<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Header Title -->
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit User') }}
            </h2>

            <!-- Back Button -->
            <a href="{{ route('users.index') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <!-- Name Input -->
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Name') }}
                                </label>
                                <input id="name" name="name" type="text"
                                    value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                    required autofocus />
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div class="mt-3">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Email') }}
                                </label>
                                <input id="email" name="email" type="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                    required />
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Role Input (Only for Admins) -->
                            @if (Auth::user()->isAdmin())
                                <div class="mt-3">
                                    <label for="role"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        {{ __('Role') }}
                                    </label>
                                    <input id="role" name="role" type="text"
                                        value="{{ old('role', $user->role) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                    @error('role')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            @else
                                <input type="hidden" name="role" value="{{ $user->role }}">
                            @endif

                            <!-- Submit Button -->
                            <div class="flex justify-end mt-6">
                                <x-primary-button>
                                    {{ __('Update User') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
