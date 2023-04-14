<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Invitation link</h3>
        
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Create an invitation link
                </p>
            </div>
        
            <div class="px-4 sm:px-0">
                
            </div>
        </div>
    
        <div class="mt-5 md:mt-0 md:col-span-2">
                @if ($team->personal_team && count($this->roles) > 0)
                <div class="col-span-6 lg:col-span-4 px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mt-5">
                    <form action="{{ route('invite.create', $team) }}" method="post">
                        @csrf
            
                        <x-label for="role" value="{{ __('Role') }}" />
                        <x-input-error for="role" class="mt-2" />
                        
                        <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          @foreach ($this->roles as $index => $role)
                          <option value="{{ $role->key }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                        
                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create link</button>
                        </div>
                    </form>
                </div>
                @endif
        </div>
    </div>


    @if ($team->teamInvitations->isNotEmpty() && Gate::check('addTeamMember', $team))
        <x-section-border />

        <!-- Team Member Invitations -->
        <div class="mt-10 sm:mt-0">
            <x-action-section>
                <x-slot name="title">
                    {{ __('Pending Team Invitations') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('These people have been invited to your team and have been sent an invitation email. They may join the team by accepting the email invitation.') }}
                </x-slot>

                <x-slot name="content">
                    <div class="space-y-6">
                        @foreach ($team->teamInvitations as $invitation)
                            <div class="flex items-center justify-between">
                                <div class="text-gray-600 dark:text-gray-400">{{ $invitation->email }}</div>

                                <div class="flex items-center">
                                    @if (Gate::check('removeTeamMember', $team))
                                        <!-- Cancel Team Invitation -->
                                        <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
                                                            wire:click="cancelTeamInvitation({{ $invitation->id }})">
                                            {{ __('Cancel') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-action-section>
        </div>
    @endif

    @if ($team->users->isNotEmpty())
        <x-section-border />

        <!-- Manage Team Members -->
        <div class="mt-10 sm:mt-0">
            <x-action-section>
                <x-slot name="title">
                    {{ __('Team Members') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('All of the people that are part of this team.') }}
                </x-slot>

                <!-- Team Member List -->
                <x-slot name="content">
                    <div class="space-y-6">
                        @foreach ($team->users->sortBy('name') as $user)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img class="w-8 h-8 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                    <div class="ml-4 dark:text-white">{{ $user->name }}</div>
                                </div>

                                <div class="flex items-center">
                                    <!-- Manage Team Member Role -->
                                    @if (Gate::check('addTeamMember', $team) && Laravel\Jetstream\Jetstream::hasRoles())
                                        <button class="ml-2 text-sm text-gray-400 underline" wire:click="manageRole('{{ $user->id }}')">
                                            {{ Laravel\Jetstream\Jetstream::findRole($user->membership->role)->name }}
                                        </button>
                                    @elseif (Laravel\Jetstream\Jetstream::hasRoles())
                                        <div class="ml-2 text-sm text-gray-400">
                                            {{ Laravel\Jetstream\Jetstream::findRole($user->membership->role)->name }}
                                        </div>
                                    @endif

                                    <!-- Leave Team -->
                                    @if ($this->user->id === $user->id)
                                        <button class="cursor-pointer ml-6 text-sm text-red-500" wire:click="$toggle('confirmingLeavingTeam')">
                                            {{ __('Leave') }}
                                        </button>

                                    <!-- Remove Team Member -->
                                    @elseif (Gate::check('removeTeamMember', $team))
                                        <button class="cursor-pointer ml-6 text-sm text-red-500" wire:click="confirmTeamMemberRemoval('{{ $user->id }}')">
                                            {{ __('Remove') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-action-section>
        </div>
    @endif

    <!-- Role Management Modal -->
    <x-dialog-modal wire:model="currentlyManagingRole">
        <x-slot name="title">
            {{ __('Manage Role') }}
        </x-slot>

        <x-slot name="content">
            <div class="relative z-0 mt-1 border border-gray-200 dark:border-gray-700 rounded-lg cursor-pointer">
                @foreach ($this->roles as $index => $role)
                    <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 {{ $index > 0 ? 'border-t border-gray-200 dark:border-gray-700 focus:border-none rounded-t-none' : '' }} {{ ! $loop->last ? 'rounded-b-none' : '' }}"
                                    wire:click="$set('currentRole', '{{ $role->key }}')">
                        <div class="{{ $currentRole !== $role->key ? 'opacity-50' : '' }}">
                            <!-- Role Name -->
                            <div class="flex items-center">
                                <div class="text-sm text-gray-600 dark:text-gray-400 {{ $currentRole == $role->key ? 'font-semibold' : '' }}">
                                    {{ $role->name }}
                                </div>

                                @if ($currentRole == $role->key)
                                    <svg class="ml-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>

                            <!-- Role Description -->
                            <div class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                                {{ $role->description }}
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="stopManagingRole" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="updateRole" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Leave Team Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingLeavingTeam">
        <x-slot name="title">
            {{ __('Leave Team') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to leave this team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLeavingTeam')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="leaveTeam" wire:loading.attr="disabled">
                {{ __('Leave') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <!-- Remove Team Member Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingTeamMemberRemoval">
        <x-slot name="title">
            {{ __('Remove Team Member') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove this person from the team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingTeamMemberRemoval')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="removeTeamMember" wire:loading.attr="disabled">
                {{ __('Remove') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
