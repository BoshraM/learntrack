<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Challenge
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 sm:p-8">

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('challenges.update', $challenge->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Title
                        </label>
                        <input type="text"
                               name="title"
                               value="{{ old('title', $challenge->title) }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Description
                        </label>
                        <textarea name="description"
                                  rows="5"
                                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                         bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                         focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $challenge->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Difficulty
                        </label>
                        <select name="difficulty"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="beginner" @selected(old('difficulty', $challenge->difficulty) == 'beginner')>
                                Beginner
                            </option>
                            <option value="intermediate" @selected(old('difficulty', $challenge->difficulty) == 'intermediate')>
                                Intermediate
                            </option>
                            <option value="advanced" @selected(old('difficulty', $challenge->difficulty) == 'advanced')>
                                Advanced
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Estimated Minutes
                        </label>
                        <input type="number"
                               name="estimated_minutes"
                               value="{{ old('estimated_minutes', $challenge->estimated_minutes) }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Category
                        </label>
                        <select name="category_id"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $challenge->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                                class="w-full sm:w-auto px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Update Challenge
                        </button>

                        <a href="{{ route('challenges.index') }}"
                           class="w-full sm:w-auto px-6 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition text-center">
                            Back to Challenges
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>