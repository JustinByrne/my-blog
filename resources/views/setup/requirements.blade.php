<x-setup-layout title="System Requirements">
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all w-full sm:align-middle sm:max-w-2xl sm:p-6">
        <div>
            <div class="text-center">
                <h1 class="text-2xl leading-6 font-medium text-gray-900">
                    My Blog
                </h1>
                <h2 class="text-lg leading-6 font-medium text-gray-900">
                    Step 1: Requirements
                </h2>
                <div class="my-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ($requirements as $requirement => $result)
                            <div>
                                @if ($result)
                                    <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                @else
                                    <svg class="absolute h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                @endif
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-700">
                                    {{ $requirement }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6">
            @if ($pass)
                <a href="{{ route('setup.database') }}" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Continue
                </a>
            @else
                <a href="{{ route('setup.requirements') }}" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Refresh
                </a>
            @endif
        </div>
    </div>
</x-setup-layout>