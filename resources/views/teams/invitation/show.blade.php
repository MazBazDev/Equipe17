<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Share this invitation to allow members to join your team
        </h2>
    </x-slot>

    <div>
        <div class="max-w-xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5 font-semibold text-xl text-gray-800 dark:text-gray-200 text-center rounded-lg shadow-lg p-10 max-w-xs">
                <div class="flex justify-center mb-3">
                    <div class=" w-32 h-32 rounded-lg shadow-lg p-4">
                        {{ $qrcode }}
                    </div>
                </div>
                <input type="text" class="mt-5 rounded-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ route("invite.accept", [$invite, $invite->token]) }}">

                <form action="{{ route("invite.destroy", $invite) }}" method="post" class="mt-5" onSubmit="if(!confirm('Are you sure ?')){return false;}">
                    @csrf
                    @method("DELETE")
                    
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-dark-900 focus:bg-red-700 dark:focus:bg-red active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Destroy invitation</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
