<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Challenge Details
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">

                    <!-- Title + difficulty -->
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold">
                                {{ $challenge->title }}
                            </h1>
                        </div>

                        <span class="shrink-0 px-3 py-1 text-xs font-medium rounded-full
                            @if($challenge->difficulty === 'beginner') bg-green-100 text-green-700
                            @elseif($challenge->difficulty === 'intermediate') bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst($challenge->difficulty) }}
                        </span>
                    </div>

                    <!-- Meta info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6 text-sm">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="font-semibold text-gray-800 dark:text-gray-200">Category</p>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                {{ $challenge->category->name ?? 'No category' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="font-semibold text-gray-800 dark:text-gray-200">Estimated Time</p>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                {{ $challenge->estimated_minutes ?? 'N/A' }} mins
                            </p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-3">Description</h3>
                        <div class="text-gray-700 dark:text-gray-300 leading-7">
                            {{ $challenge->description }}
                        </div>
                    </div>

                    <!-- Completion status -->
                    @auth
                        <div class="mb-6">
                            @if (!auth()->user()->completedChallenges()->where('challenge_id', $challenge->id)->exists())
                                <form method="POST" action="{{ route('challenges.complete', $challenge->id) }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full sm:w-auto px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                        Mark as Complete
                                    </button>
                                </form>
                            @else
                                <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-lg font-medium">
                                    Completed ✅
                                </div>
                            @endif
                        </div>
                    @endauth

                    <!-- Action buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        @auth
                            <a href="{{ route('challenges.edit', $challenge->id) }}"
                               class="w-full sm:w-auto px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-center">
                                Edit
                            </a>
                        @endauth

                        <a href="{{ route('challenges.index') }}"
                           class="w-full sm:w-auto px-6 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-600 transition text-center">
                            Back to Challenges
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>