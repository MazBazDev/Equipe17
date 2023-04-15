
<x-app-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <input id="error" value="{{$error}}" hidden>
                    <script>
                        alert(document.getElementById("error").value);
                    </script>
                @endforeach
            </ul>
        </div>
        
    @endif
    {{$inTeam = false}}
    @foreach ($blueTeamUsers as $blueUser)
        @if($blueUser->id == $user->id)
            @php
                $inTeam = true;
            @endphp
        @endif
    @endforeach
    @foreach ($redTeamUsers as $redUser)
        @if($redUser->id == $user->id)
            @php
                $inTeam = true;
            @endphp
        @endif
    @endforeach
    @if($inTeam)
        <form method="post" action="{{ route('matches.detail') }}">
            @csrf
            <input id="match" name="match" value="{{$match->id}}" type="hidden">
            <div class="flex justify-evenly">
                <x-guest-layout>
                    <div class="grid grid-cols-25 w-full">
                        <table class="min-w-full text-center">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium px-6 py-4">  Red Side Players </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($redTeamUsers as $redUser)
                                    <tr class="border-b text-gray-100">
                                        <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                            <x-input value="➖ {{$redUser->name}}" disabled></x-input>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-guest-layout>
                <x-guest-layout>
                    <div class="flex-column pt-2 justify-center">
                        <div class="rounded p-3 mx-5 bg-white">
                            <div class="flex justify-center">
                                {{ $qrcode }}
                            </div>
                        </div>
                       
                        <div class="flex-column justify-center">
                            <div class="flex justify-center pt-2 pb-3 mx-5">
                                <h1 class="p-1">
                                    Gamemode :
                                </h1> 
                                <h2 class="p-1">
                                    {{$match->gamemode}}
                                </h2>
                            </div>
    
                            <div class="flex justify-center pt-2 pb-3 mx-5">
                                <h1  class="p-1">
                                    State of the match :
                                </h1>
                                <h2 class="p-1">
                                    @switch($match->state)
                                        @case(0)
                                            Waiting... ⏳
                                            @break
                                        @case(1)
                                            Started ! 🎈
                                            @break
                                    
                                        @case(2)
                                            Done. ✅
                                            @break
                                    @endswitch
                                </h2>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            @if (count($blueTeamUsers) > 0 && count($redTeamUsers) > 0 )
                                <x-guest-layout>
                                    <button type="submit" class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Start
                                    </button>
                                </x-guest-layout>
                            @else
                                <x-guest-layout>
                                    <button type="submit" class="mt-5 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" disabled>
                                        Start
                                    </button>
                                </x-guest-layout>
                            @endif
                        </div>
                    </div>
                </x-guest-layout>
                
                <x-guest-layout>
                    <div class="grid grid-cols-25 w-full">
                        <table class="min-w-full text-center">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium px-6 py-4"> Blue Side Players </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blueTeamUsers as $blueUser)
                                    <tr class="border-b text-gray-100">
                                        <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                            <x-input value="➖ {{$blueUser->name}}" disabled></x-input>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-guest-layout>
            </div>
        </form>
    @else
        <form id="form" method="post" action="{{ route('matches.join') }}">
            @csrf
            <input id="team" name="team" value="" type="hidden">
            <input id="user" name="user" value="{{$user->id}}" type="hidden">
            <input id="match" name="match" value="{{$match->id}}" type="hidden">
            <button class="popup flex justify-between" type="submit" onclick="document.getElementById('team').value='blue'">
                🔵 Join Blue Team
            </button>
            <button class="popup flex justify-between" type="submit" onclick="document.getElementById('team').value='red'">
                🔴 Join Red Team
            </button>
        </form>
    @endif
</x-app-layout>
