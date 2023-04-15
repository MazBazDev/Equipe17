<x-app-layout>
    <div>
        <div class="max-w-xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5 font-semibold text-xl text-gray-800 dark:text-gray-200 text-center rounded-lg shadow-lg p-10 max-w-xs">
                <div class="flex justify-center mb-3">
                    <div class=" h-32 rounded-lg shadow-lg p-4">
                        <form id="form" method="post" action="{{ route('matches.create') }}">
                            @csrf

                            <label for="gamemode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select a gamemode</label>
                            <select name="gamemode" id="gamemode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($gamemodes as $gamemode)
                                    <option value="{{$gamemode}}">{{ $gamemode }}</option>
                                @endforeach
                            </select>
                           
                            <button type="submit" class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create Match</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
