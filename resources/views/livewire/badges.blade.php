<div>
    <div class="mt-0 sm:mt-0">
        <div class="md:grid md:grid-cols-1 pt-5 md:gap-6">
            <div class="md:mt-0 md:col-span-2">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                    <h3 class="pb-5 text-lg font-medium text-gray-900 dark:text-gray-200">Create a Badge</h3>
                    @if($updateMode)
                        @include('livewire.editBadge')
                    @else
                        @include('livewire.addBadge')
                    @endif
                    <div class="border-b border-gray-200 dark:border-gray-700 pt-10 mb-10"></div>
                @endif
            </div>
        </div>
        <div class="flex flex-col mt-0">
        <div class="pb-2 md:col-span-1">
                <div class="px-4 pt-0 sm:px-0">
                    <h3 class="text-lg pb-4 font-medium text-gray-900  dark:text-gray-200">Your Badges</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        {{-- Need to keep this in for the TailwindJIT to pickup these colors 
                            class="bg-pink-500 bg-purple-500 bg-indigo-500 bg-blue-500 bg-green-500 bg-yellow-500 bg-red-500 bg-gray-500"
                        --}}

                        @forelse(auth()->user()->badges()->get() as $badge)
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-{{ $badge->color }}-500 rounded-full">
                                {{ $badge->name }}
                            </span>
                        @empty
                            You don't have any badges. 
                            @if(!count($badges))
                                Your company admin has not created any badges yet.
                            @else
                                Check out the badges below. 
                            @endif
                        @endforelse
                    </p>
                </div>
            </div>
        <div class="px-4 pb-10 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Your Guild Badges!</h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Win badges for your accomplishments.
                    </p>
                </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 dark:border-gray-700 border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                        Type
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                        Value
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                        Color
                                    </th>
                                    @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($badges as $badge)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900  dark:text-gray-200">{{ $badge->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $badge->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-200">{{ $badge->requirement_class }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-200">{{ $badge->requirement_value }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-{{ $badge->color }}-500 rounded-full">
                                                {{ $badge->color }}
                                            </span>
                                        </td>
                                        @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                <button wire:click="edit({{ $badge->id }})" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-500 hover:dark-text-indigo-400">Edit</button>
                                                <button wire:click="delete({{ $badge->id }})" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-500 hover:dark-text-indigo-400">Delete</button>
                                            </td>
                                        @endif
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
