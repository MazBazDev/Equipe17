<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Link
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            {{ $qrcode }}

            <form action="{{ route("invite.destroy", $invite) }}" method="post">
                @csrf
                @method("DELETE")
                
                <button type="submit">destroy</button>
            </form>
        </div>
    </div>
</x-app-layout>
