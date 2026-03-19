<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('LearnTrack') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Hero -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8 text-center text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl sm:text-4xl font-bold mb-4">
                        LearnTrack
                    </h1>

                    <p class="text-base sm:text-lg text-gray-600 dark:text-gray-400 mb-6 max-w-3xl mx-auto">
                        Track your learning challenges and monitor your progress
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
                        <a href="{{ route('challenges.index') }}"
                           class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-center">
                            Explore Challenges
                        </a>

                        <a href="{{ route('categories.index') }}"
                           class="w-full sm:w-auto px-6 py-3 bg-gray-200 dark:bg-gray-700 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition text-center">
                            Browse Categories
                        </a>

                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="w-full sm:w-auto px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-center">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="w-full sm:w-auto px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition text-center">
                                Login
                            </a>

                            <a href="{{ route('register') }}"
                               class="w-full sm:w-auto px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition text-center">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Explore Challenges</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Browse structured learning tasks by category
                        </p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Track Progress</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Mark challenges complete and monitor your journey
                        </p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Organized Learning</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Group challenges by category for clarity
                        </p>
                    </div>
                </div>
            </div>

            <!-- About -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl sm:text-2xl font-semibold mb-4 text-center">About This Project</h2>

                    <p class="text-gray-600 dark:text-gray-400 text-center max-w-3xl mx-auto leading-7 text-sm sm:text-base">
                        I built LearnTrack as a Laravel portfolio project to demonstrate practical skills in authentication,
                        CRUD operations, database relationships, and user progress tracking. It reflects my interest in
                        educational digital products and was developed through hands-on practice, documentation, and
                        AI-assisted learning.
                    </p>
                </div>
            </div>

            <!-- Footer note -->
            <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                Built with Laravel • Portfolio Project
            </div>

        </div>
    </div>
</x-app-layout>