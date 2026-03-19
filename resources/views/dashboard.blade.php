<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            My Progress
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Completed Challenges
                    </p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                        {{ $completedChallenges->count() }}
                    </p>
                </div>

            </div>

            <!-- Completed Challenges -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 sm:p-8">

                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                    Completed Challenges
                </h3>

                @forelse ($completedChallenges as $challenge)
                    <div class="border-b border-gray-200 dark:border-gray-700 py-4 last:border-0">

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                            <div>
                                <h4 class="text-md font-semibold text-gray-900 dark:text-white">
                                    {{ $challenge->title }}
                                </h4>

                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    {{ $challenge->category->name ?? 'No category' }} • 
                                    {{ ucfirst($challenge->difficulty) }}
                                </p>
                            </div>

                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($challenge->pivot->completed_at)->format('d M Y') }}
                            </div>

                        </div>

                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">
                        You have not completed any challenges yet.
                    </p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>