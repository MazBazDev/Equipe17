
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
            <div class="flex justify-between">
                <x-guest-layout>
                    <div class="grid grid-cols-25 w-full">
                        <h1>
                            Red Side Players :
                        </h1> 
                        @foreach($redTeamUsers as $redUser)
                            <x-input value="➖ {{$redUser->name}}" disabled>
                            </x-input>
                        @endforeach
                    </div>
                </x-guest-layout>
                <x-guest-layout>
                    {{ $qrcode }}
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
                            Blue Side Players :
                        </h1> 
                        @foreach($blueTeamUsers as $blueUser)
                            <x-input value="➖ {{$blueUser->name}}" disabled>
                            </x-input>
                        @endforeach
                    </div>
                </x-guest-layout>
            </div>
            <div style="margin: 0 auto;
            width: 110px;">
            @if (count($blueTeamUsers) > 0 && count($redTeamUsers) > 0 )
                <x-guest-layout>
                    <button type="submit" class="button-85-valid" >
                        Start
                    </button>
                </x-guest-layout>
            @else
                <x-guest-layout>
                    <button type="submit" class="button-85-invalid" disabled>
                        Start
                    </button>
                </x-guest-layout>
            @endif
                
            </div>
        </form>
    @else
        <form id="form" method="post" action="{{ route('matches.join') }}">
            @csrf
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
