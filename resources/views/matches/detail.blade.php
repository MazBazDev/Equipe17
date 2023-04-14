<x-app-layout>
    <form method="post" action="{{ route('matches.end') }}">
            @csrf
        <div class="flex justify-between">
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
        <div class="flex justify-between">
            <x-guest-layout>
                <h1 style="color:blue">
                    Team Blue
                </h1>
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
                <div>
                </div>
                <h1>
                    VS
                </h1>
            </x-guest-layout>
            <x-guest-layout>
                <div class="grid grid-cols-25 w-full ">
                    <h1 style="color:red">
                        Team Red
                    </h1>
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
        <div class="flex justify-between">
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
                <button type="submit" class="button-85-valid">
                    End the match
                </button>
            </x-guest-layout>
            <x-guest-layout>
            </x-guest-layout>
        </div>
    </form>
</x-app-layout>