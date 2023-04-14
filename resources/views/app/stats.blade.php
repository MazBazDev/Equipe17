<!-- app.stats.blade.php -->

<p>Total games played: {{ $totalMatches }}</p>
<p>Wins: {{ $totalWins }} ({{ $winRate }}%)</p>
<p>Losses: {{ $totalLosses }} ({{ $lossRate }}%)</p>

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
