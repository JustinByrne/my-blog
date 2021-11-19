<x-setup-layout>
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
        <div>
            <div class="text-center">
                <h1 class="text-2xl leading-6 font-medium text-gray-900">
                    My Blog
                </h1>
                <div class="mt-5">
                    <p class="text-sm text-gray-500">
                        Thank you for chosing to use My Blog. Although the name is My Blog this is now yours! So make it what you want.
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6">
            <a href="{{ route('setup.requirements') }}" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                Start Install
            </a>
        </div>
    </div>
</x-setup-layout>