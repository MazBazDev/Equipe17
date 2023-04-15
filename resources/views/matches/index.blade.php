<x-app-layout>
    <x-guest-layout>
        <div class="d-flex flex-row justify-content-center">
            <div>
                <form id="form" method="post" action="{{ route('matches.create') }}">
                    @csrf
                    <div>
                        <div class="d-flex flex-column p-3">
                            <p>Select your gamemode :</p>
                            <select name="gamemode" id="gamemode">
                                @foreach ($gamemodes as $gamemode)
                                    <option value="{{$gamemode}}">{{ $gamemode }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <button type="submit" class="btn btn-outline-danger mx-5">
                            Create Match
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-guest-layout>
</x-app-layout>

