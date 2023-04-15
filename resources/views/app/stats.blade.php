<x-app-layout>

    <div class="flex justify-center mt-8" style="color: #ffffff">
        <div class="text-center">
            <h1 class="text-2xl">Stats </h1>
            <h2 class=" mt-5">Total games played: {{ $totalMatches }}</h2>
            <h2>Wins: {{ $totalWins }} ({{ $winRate }}%)</h2>
            <h2>Losses: {{ $totalLosses }} ({{ $lossRate }}%)</h2>
            <hr class="mt-5">
            <div class="flex flex-col mt-5">
                <h1 class="text-center text-2xl">Matches</h1>
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-center">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Id</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Side</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Score RED</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Score BLUE</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Mode</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="border-b text-gray-100">
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->id }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->side }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->scoreR }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->scoreB }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->gamemode }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                @switch($item->state)
                                                    @case(0)
                                                        Pending
                                                    @break

                                                    @case(1)
                                                        Started
                                                    @break

                                                    @case(2)
                                                        Ended
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-8" style="color: #ffffff">
        <div class="text-center">
            <h1 class="text-2xl">Classement</h1>
            <hr class="mt-5">
            <div class="flex flex-col mt-5">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-center">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Rank</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Name</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Win Rate</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Total Matches</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Total Wins</th>
                                        <th scope="col" class="text-sm font-medium px-6 py-4">Total Losses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userStats as $index => $user)
                                        <tr class="border-b text-gray-100">
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $index + 1 }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $user['name'] }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $user['win_rate'] }}%</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $user['total_matches'] }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $user['total_wins'] }}</td>
                                            <td class="text-sm text-gray-100 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $user['total_losses'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
