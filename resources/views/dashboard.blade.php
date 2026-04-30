<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-3xl font-bold mb-6">
                        📋 Welcome Worms
                    </h1>

                    <p class="mb-6 text-lg">
                        Your productivity empire awaits.
                    </p>

                    <a href="/tasks">

                        <button class="
                            bg-green-500
                            hover:bg-green-600
                            text-white
                            px-6
                            py-3
                            rounded-lg
                            font-bold
                            transition
                        ">
                            📝 Open Task App
                        </button>

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
