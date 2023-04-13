
<x-app-layout>
    <div class="flex justify-between">
        <x-guest-layout>
            <div class="grid grid-cols-25 w-full ">
                <h1>
                    Red Side Players :
                </h1> 
                @foreach($redTeamUsers as $user)
                    <h2>
                        ➖ {{$user->name}}
                    </h2>
                @endforeach
            </div>
        </x-guest-layout>

        <x-guest-layout>
            <div class="grid grid-cols-25 w-full" style="margin: 0 auto;
            width: 100px;">
                <h1>
                    Gamemode :
                </h1> 
                <h2>
                    {{$match->gamemode}}
                </h2>
                <br><br>
                <h1>
                    State of the match :
                </h1>
                <h2>
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
        </x-guest-layout>
        
        <x-guest-layout>
            <div class="grid grid-cols-25 w-full">
                
                <h1>
                    <button onclick="alert('x')">➕</button> Blue Side Players :
                </h1> 
                @foreach($blueTeamUsers as $user)
                    <h2>
                        ➖ {{$user->name}}
                    </h2>
                @endforeach
                
            </div>
        </x-guest-layout>
    </div>
</x-app-layout>

