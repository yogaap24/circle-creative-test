<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
            @if (Auth::user()->isAdmin())
                <!-- Cek apakah pengguna adalah admin -->
                <a href="{{ route('users.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Create User') }}
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Display Users -->
                    @if ($users->isEmpty())
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            {{ __('No users found.') }}
                        </div>
                    @else
                        <ul class="space-y-4">
                            @foreach ($users as $user)
                                <li class="relative bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                                    <a href="{{ route('users.show', $user->id) }}" class="block p-4 mt-6 h-full w-full">
                                        <div class="flex flex-col h-full">
                                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                {{ __('Click to view details') }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
