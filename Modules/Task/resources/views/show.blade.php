<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- Header Title -->
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Task Details') }}
            </h2>

            <!-- Back Button -->
            <a href="{{ route('tasks.index') }}"
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
                    <div class="mb-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">{{ $task->title }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $task->description }}</p>
                    </div>


                    @if (Auth::user()->isAdmin())
                        <div class="mt-6 flex space-x-4">
                            <a href="{{ route('tasks.edit', $task->id) }}"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Edit Task') }}
                            </a>

                            <!-- Conditional Delete Button -->
                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this Task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    style="margin-left: 1em">
                                    {{ __('Delete Task') }}
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
