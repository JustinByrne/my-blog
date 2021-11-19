<x-setup-layout title="Database setup">
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all w-full sm:align-middle sm:max-w-2xl sm:p-6"  x-data="{db: 'mysql'}">
        <form method="POST">
            @csrf

            <div class="text-center">
                <h1 class="text-2xl leading-6 font-medium text-gray-900">
                    My Blog
                </h1>
                <h2 class="text-lg leading-6 font-medium text-gray-900">
                    Step 2: Database
                </h2>
                <div class="my-5 text-left">
                    @if ($errors->any())
                        <div class="rounded-md bg-red-50 p-4 mb-3">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: solid/x-circle -->
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        {{ $errors->first() }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div>
                        <label for="db_connection" class="block text-sm font-medium text-gray-700">
                            Database Server
                        </label>
                        <select id="db_connection" name="db_connection" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" x-on:change="db = $event.target.value">
                            <option value="mysql" selected>MySQL</option>
                            {{-- <option value="sqlite">SQLite</option> --}}
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2 pt-3" x-bind:class="{ 'hidden' : db != 'mysql'}">
                        <div>
                            <label for="db_host" class="block text-sm font-medium text-gray-700">
                                DB Host
                            </label>
                            <div class="mt-1">
                                <input type="text" name="db_host" id="db_host" value="{{ old('db_host', '127.0.0.1') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="db_port" class="block text-sm font-medium text-gray-700">
                                DB Port
                            </label>
                            <div class="mt-1">
                                <input type="text" name="db_port" id="db_port" value="{{ old('db_port', '3306') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="db_database" class="block text-sm font-medium text-gray-700">
                                DB Database
                            </label>
                            <div class="mt-1">
                                <input type="text" name="db_database" id="db_database" value="{{ old('db_database', 'laravel') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="db_username" class="block text-sm font-medium text-gray-700">
                                DB Username
                            </label>
                            <div class="mt-1">
                                <input type="text" name="db_username" id="db_username" value="{{ old('db_username', 'root') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div>
                            <label for="db_password" class="block text-sm font-medium text-gray-700">
                                DB Password
                            </label>
                            <div class="mt-1">
                                <input type="password" name="db_password" id="db_password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    {{-- <div x-bind:class="{ 'hidden' : db != 'sqlite'}">
                        <div class="pt-3">
                            <label for="db_database" class="block text-sm font-medium text-gray-700">
                                DB Database
                            </label>
                            <div class="mt-1">
                                <input type="text" name="db_database" id="db_database" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Absolute path e.g. /db/laravel.sqlite">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <div x-bind:class="{ 'hidden' : db == 'not selected'}">
                    <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                        Continue
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-setup-layout>