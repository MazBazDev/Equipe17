<x-app-layout>
    <div class="flex justify-between">
        <x-guest-layout>
            @foreach($blueTeamUsers as $bUser)
                    <h2>
                        Name : {{$bUser->name}}
                    </h2>
                    <img src={{$bUser->profile_photo_url}}>
                    <h2>
                        Elo : {{$bUser->elo}}
                    </h2>
                @endforeach
        </x-guest-layout>   
        <x-guest-layout>
            <div class="grid grid-cols-25 w-full">
                <h1> 
                    CurrentUSER : {{$user->name}}
                </h1>
                <h1>
                    Score : {{$match->score}}
                </h1>
                <h1>
                    Gamemode : {{$match->gamemode}}
                </h1>
                <h1>
                    @switch($match->state)
                        @case(0)
                            Waiting... ⏳
                            @break
                        @case(1)
                            Started ! 🎈
                            @break
                    
                        @case(1)
                            Done. ✅
                            @break
                    @endswitch
                </h1>
            </div>
        </x-guest-layout>
        <x-guest-layout>
            <div class="grid grid-cols-25 w-full ">
                @foreach($redTeamUsers as $rUser)
                <h2>
                    Name : {{$rUser->name}}
                </h2>
                <img src={{$rUser->profile_photo_url}}>
                <h2>
                    Elo : {{$rUser->elo}}
                </h2>
                @endforeach
            </div>
        </x-guest-layout>
    </div>
</x-app-layout>