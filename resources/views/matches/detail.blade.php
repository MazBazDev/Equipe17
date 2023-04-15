<x-app-layout>
    <form method="post" action="{{ route('matches.end') }}">
            @csrf
        <div class="flex justify-center pt-5">
            <x-guest-layout>
            </x-guest-layout>
            <x-guest-layout>
                <h1>
                    Gamemode : {{$match->gamemode}}
                </h1>
            </x-guest-layout>
            <x-guest-layout>
            </x-guest-layout>
        </div>
        <div class="flex justify-evenly">
            <x-guest-layout>
                <div class="flex-row justify-center">
                    <table class="min-w-full text-center">
                        <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium px-6 py-4">
                                    <h1 class="text-3xl pb-5" style="color:blue">
                                        Team Blue
                                    </h1>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blueTeamUsers as $bUser)
                                <tr class="border-b text-gray-100">
                                    <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <img class="h-32 w-32 rounded-xl" src={{$bUser->profile_photo_url}}>
                                        </div>
                                        <h2 class="text-5xl">
                                            {{$bUser->name}}
                                        </h2>
                                        <h3 class="text-end">
                                            {{$bUser->elo}} 🏆
                                        </h3>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-guest-layout>   
            <x-guest-layout>
                <div class="pt-20">
                    <h1 class="pt-10 font-bold text-7xl">
                        VS
                    </h1>
                </div>
            </x-guest-layout>
            <x-guest-layout>
                <div class="flex-row justify-center">
                    <table class="min-w-full text-center">
                        <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium px-6 py-4">
                                    <h1 class="text-3xl pb-5" style="color:red">
                                        Team Red
                                    </h1>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($redTeamUsers as $rUser)
                                <tr class="border-b text-gray-100">
                                    <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <img class="h-32 w-32 rounded-xl" src={{$rUser->profile_photo_url}}>
                                        </div>
                                        <h2 class="text-5xl">
                                            {{$rUser->name}}
                                        </h2>
                                        <h2 class="text-end">
                                            {{$rUser->elo}} 🏆
                                        </h2>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-guest-layout>
        </div>
        <div class="p-5 flex justify-between">
            <x-guest-layout>
            </x-guest-layout>
            <x-guest-layout>
                <input type="number" id="scoreB" name="scoreB"
            min="0" max="10" value="{{$match->score}}">
            ➖
                <input type="number" id="scoreR" name="scoreR"
                min="0" max="10" value="{{$match->score}}">
            </x-guest-layout>
            <x-guest-layout>
            </x-guest-layout>
        </div>
        <div class="flex justify-between">
            <x-guest-layout>
            </x-guest-layout>
            <x-guest-layout>
                <input id="match" name="match" value="{{$match->id}}" type="hidden">
                <button type="submit" class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">End the match</button>     
            </x-guest-layout>
            <x-guest-layout>
            </x-guest-layout>
        </div>
    </form>
</x-app-layout>