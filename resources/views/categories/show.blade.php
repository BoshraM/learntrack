<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Category Details
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 sm:p-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                    {{ $category->name }}
                </h1>

                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    <span class="font-semibold">Slug:</span> {{ $category->slug }}
                </p>

                <div class="text-gray-700 dark:text-gray-300 leading-7 mb-6">
                    {{ $category->description ?: 'No description provided.' }}
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    @auth
                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="w-full sm:w-auto px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-center">
                            Edit
                        </a>
                    @endauth

                  <a href="{{ route('categories.index') }}"
                    class="w-full sm:w-auto px-6 py-2 bg-gray-700 text-white rounded-lg
                            hover:bg-gray-600 transition text-center">
                      Back to Categories
                  </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>