
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
                    <div class="">
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
                    <div class="d-flex flex-column justify-content-center">
                        <div class="rounded p-3 mx-5 bg-white">
                            {{ $qrcode }}
                        </div>
                       
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row justify-content-center pt-2 pb-3 mx-5">
                                <h1 class="p-1">
                                    Gamemode :
                                </h1> 
                                <h2 class="p-1">
                                    {{$match->gamemode}}
                                </h2>
                            </div>
    
                            <div class="d-flex flex-row justify-content-center pt-2 pb-3 mx-5">
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

                        <div class="d-flex flex-row justify-content-center">
                            @if (count($blueTeamUsers) > 0 && count($redTeamUsers) > 0 )
                                <x-guest-layout>
                                    <button type="submit" class="btn btn-outline-danger" >
                                        Start
                                    </button>
                                </x-guest-layout>
                            @else
                                <x-guest-layout>
                                    <button type="submit" class="btn btn-outline-danger" disabled>
                                        Start
                                    </button>
                                </x-guest-layout>
                            @endif
                        </div>
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
