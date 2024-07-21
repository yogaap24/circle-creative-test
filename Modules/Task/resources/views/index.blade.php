<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tasks') }}
            </h2>
            @if (Auth::user()->isAdmin())
                <!-- Cek apakah pengguna adalah admin -->
                <a href="{{ route('tasks.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Create Task') }}
                </a>
            @else
                <form method="POST" action="{{ route('tasks.read_all') }}">
                    @csrf
                    <x-secondary-button type="submit">
                        {{ __('Read All Task') }}
                    </x-secondary-button>
                </form>
            @endif
        </div>
    </x-slot>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Display Tasks -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">
                            {{ __('Your Tasks') }}
                        </h3>
                    </div>

                    @if ($tasks->isEmpty())
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            {{ __('No tasks found.') }}
                        </div>
                    @else
                        <ul>
                            @foreach ($tasks as $task)
                                <li
                                    class="flex items-center justify-between p-4 mt-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $task->title }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('tasks.show', $task) }}"
                                            class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                                            {{ __('View') }}
                                        </a>
                                        @can('update', $task)
                                            <a href="{{ route('tasks.edit', $task) }}"
                                                class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 ml-4">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                        @can('delete', $task)
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 ml-4">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
