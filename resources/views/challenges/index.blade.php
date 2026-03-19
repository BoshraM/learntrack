@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Challenges') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Top bar -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100">
                        Challenges
                    </h1>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 mt-1">
                        Explore and manage learning challenges
                    </p>
                </div>

                @auth
                    <a href="{{ route('challenges.create') }}"
                       class="inline-flex items-center justify-center px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Create New Challenge
                    </a>
                @endauth
            </div>

            <!-- Challenges Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($challenges as $challenge)
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden flex flex-col">
                        <div class="p-6 flex flex-col flex-grow">

                            <div class="flex items-start justify-between gap-3 mb-3">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $challenge->title }}
                                </h2>

                                <span class="shrink-0 px-3 py-1 text-xs font-medium rounded-full
                                    @if($challenge->difficulty === 'beginner') bg-green-100 text-green-700
                                    @elseif($challenge->difficulty === 'intermediate') bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-700
                                    @endif">
                                    {{ ucfirst($challenge->difficulty) }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-600 dark:text-gray-400 leading-6 flex-grow">
                                {{ Str::limit($challenge->description, 110) }}
                            </p>

                            <div class="mt-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <p>
                                    <span class="font-semibold text-gray-800 dark:text-gray-200">Category:</span>
                                    {{ $challenge->category->name ?? 'No category' }}
                                </p>

                                <p>
                                    <span class="font-semibold text-gray-800 dark:text-gray-200">Estimated time:</span>
                                    {{ $challenge->estimated_minutes ?? 'N/A' }} mins
                                </p>
                            </div>

                            <!-- Actions -->
                            <div class="mt-5 flex flex-col gap-2">
                                <a href="{{ route('challenges.show', $challenge->id) }}"
                                   class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-center">
                                    View
                                </a>

                                @auth
                                    <div class="flex gap-2">
                                        <a href="{{ route('challenges.edit', $challenge->id) }}"
                                           class="w-1/2 px-3 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition text-center text-sm">
                                            Edit
                                        </a>

                                        <form method="POST"
                                              action="{{ route('challenges.destroy', $challenge->id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this challenge?')"
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
                        No challenges found.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($challenges->hasPages())
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-4 flex justify-center">
                        {{ $challenges->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>