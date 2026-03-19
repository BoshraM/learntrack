@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Top bar -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100">
                        Categories
                    </h1>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mt-1">
                        Browse and manage learning categories
                    </p>
                </div>

                @auth
                    <a href="{{ route('categories.create') }}"
                       class="inline-flex items-center justify-center px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Create New Category
                    </a>
                @endauth
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($categories as $category)
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden flex flex-col">
                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $category->name }}
                            </h2>

                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 flex-grow leading-6">
                                {{ Str::limit($category->description, 100) ?: 'No description provided.' }}
                            </p>

                            <!-- Actions -->
                            <div class="mt-4 flex flex-col gap-2">
                                <a href="{{ route('categories.show', $category->id) }}"
                                   class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-center">
                                    View
                                </a>

                                @auth
                                    <div class="flex gap-2">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                           class="w-1/2 px-3 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-center text-sm">
                                            Edit
                                        </a>

                                        <form method="POST"
                                              action="{{ route('categories.destroy', $category->id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this category?')"
                                              class="w-1/2">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="w-full px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 text-center text-gray-600 dark:text-gray-400">
                        No categories found.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($categories->hasPages())
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>