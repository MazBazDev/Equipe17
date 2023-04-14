<x-app-layout>

<!-- app.stats.blade.php -->

<h2>Total games played: {{ $totalMatches }}</h2>
<h2>Wins: {{ $totalWins }} ({{ $winRate }}%)</h2>
<h2>Losses: {{ $totalLosses }} ({{ $lossRate }}%)</h2>

{{-- <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Player ID</th>
            <th>Match ID</th>
            <th>Side</th>
            <th>ScoreR</th>
            <th>ScoreB</th>
            <th>Mode</th>
            <th>State</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->player_id }}</td>
            <td>{{ $item->match_id }}</td>
            <td>{{ $item->side }}</td>
            <td>{{ $item->scoreR }}</td>
            <td>{{ $item->scoreB }}</td>
            <td>{{ $item->mode }}</td>
            <td>{{ $item->state }}</td>
        </tr>
        @endforeach
    </tbody>
</table> --}}

</x-app-layout>