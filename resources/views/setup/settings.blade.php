<x-setup-layout title="Settings">
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all w-full sm:align-middle sm:max-w-2xl sm:p-6">
        <form method="POST">
            @csrf

            <div class="text-center">
                <h1 class="text-2xl leading-6 font-medium text-gray-900">
                    My Blog
                </h1>
                <h2 class="text-lg leading-6 font-medium text-gray-900">
                    Step 3: Settings
                </h2>
                <div class="my-5 text-left flex flex-col space-y-3">
                    <div>
                        <label for="app_name" class="block text-sm font-medium text-gray-700">
                            Site Name
                        </label>
                        <div class="mt-1">
                            <input type="text" required name="app_name" id="app_name" value="{{ old('app_name', 'My Blog') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="app_url" class="block text-sm font-medium text-gray-700">
                            Site URL
                        </label>
                        <div class="mt-1">
                            <input type="text" required name="app_url" id="app_url" value="{{ old('app_url', 'http://localhost') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <div class="mt-1">
                            <input type="email" required name="username" id="username" value="{{ old('username', 'admin@example.com') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input type="password" required name="password" id="password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input type="password" required name="password_confirmation" id="password_confirmation" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Finish
                </button>
            </div>
        </form>
    </div>
</x-setup-layout>