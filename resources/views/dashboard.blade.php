<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Progress') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-lg font-semibold">
                        Total completed challenges: {{ $completedChallenges->count() }}
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Completed Challenges</h3>

                    @forelse ($completedChallenges as $challenge)
                        <div class="border-b border-gray-200 dark:border-gray-700 py-4">
                            <h4 class="text-md font-semibold">{{ $challenge->title }}</h4>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Category: {{ $challenge->category->name ?? 'No category' }}
                            </p>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Difficulty: {{ ucfirst($challenge->difficulty) }}
                            </p>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Completed at: {{ $challenge->pivot->completed_at }}
                            </p>
                        </div>
                    @empty
                        <p>You have not completed any challenges yet.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>