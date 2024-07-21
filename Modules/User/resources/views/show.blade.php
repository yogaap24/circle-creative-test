<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Header Title -->
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Details') }}
            </h2>

            <!-- Back Button -->
            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                    <div class="space-y-4">
                        <!-- User Details -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Name') }}</h3>
                            <p class="mt-1 text-gray-700 dark:text-gray-300">{{ $user->name }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Email') }}</h3>
                            <p class="mt-1 text-gray-700 dark:text-gray-300">{{ $user->email }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Role') }}</h3>
                            <p class="mt-1 text-gray-700 dark:text-gray-300">{{ ucfirst($user->role) }}</p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6 flex space-x-4">
                            <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Edit User') }}
                            </a>

                            <!-- Conditional Delete Button -->
                            @if (Auth::user()->isAdmin())
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" style="margin-left: 1em">
                                        {{ __('Delete User') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
