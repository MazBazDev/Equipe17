<x-app-layout>
    <x-guest-layout>
        <div class="grid grid-cols-12 w-full" style="margin: 0 auto;
        width: 100px;">
            <form id="form" method="post" action="{{ route('matches.create') }}">
                @csrf
                <select name="gamemode" id="gamemode">
                    @foreach ($gamemodes as $gamemode)
                        <option value="{{$gamemode}}">{{ $gamemode }}</option>
                    @endforeach
                </select>
                <button type="submit" class="button-toggle">
                    Create Match
                </button>
            </form>
        </div>
    </x-guest-layout>
</x-app-layout>

