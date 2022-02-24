<div>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-3">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                @if($updateMode)
                    @include('livewire.editTask')
                @else
                    @include('livewire.addTask')
                @endif
            </div>
        </div>
        <div class="flex flex-col mt-10">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-1 pr-4">
                    <div class="relative md:w-1/3">
                        <input type="search" wire:model="search" class="w-full py-2 pl-10 pr-4 font-medium text-gray-600 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 rounded-lg shadow focus:outline-none focus:shadow-outline" placeholder="Search task by title...">
                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <circle cx="10" cy="10" r="7"></circle>
                                <line x1="21" y1="21" x2="15" y2="15"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex rounded-lg shadow">
                        <div class="relative" x-data="{ open: false }">
                            <button @click.prevent="open = !open"
                                class="inline-flex items-center px-2 py-2 font-semibold text-gray-500 bg-white rounded-lg hover:text-blue-500 focus:outline-none focus:shadow-outline md:px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <path
                                        d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                                </svg>
                                <span class="hidden md:block">Display</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute top-0 right-0 z-40 block w-40 py-1 mt-12 -mr-1 overflow-hidden bg-white rounded-lg shadow-lg">
                                <label class="flex items-center justify-start px-4 py-2 text-truncate hover:bg-gray-100">
                                    <div class="mr-3 text-teal-600">
                                        <input type="checkbox" wire:model="taskStatus" value="To Do" class="form-checkbox focus:outline-none focus:shadow-outline" checked="">
                                    </div>
                                    <div class="text-gray-700 select-none" >To Do </div>
                                </label>
                                <label class="flex items-center justify-start px-4 py-2 text-truncate hover:bg-gray-100">
                                    <div class="mr-3 text-teal-600">
                                        <input type="checkbox" wire:model="taskStatus" value="In Progress" class="form-checkbox focus:outline-none focus:shadow-outline" checked="">
                                    </div>
                                    <div class="text-gray-700 select-none" >In Progress </div>
                                </label>
                                <label class="flex items-center justify-start px-4 py-2 text-truncate hover:bg-gray-100">
                                    <div class="mr-3 text-teal-600">
                                        <input type="checkbox" wire:model="taskStatus" value="Completed" class="form-checkbox focus:outline-none focus:shadow-outline" checked="">
                                    </div>
                                    <div class="text-gray-700 select-none" >Completed</div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="inline-block max-w-3xl min-w-full py-2 align-middle">
                    <div class="overflow-hidden border-b border-gray-200 dark:border-gray-700 border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        User
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Task
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        <a wire:click.prevent="sortBy('status')" role="button" href="#" class="underline">Status</a>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Change Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Manage
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($tasks as $task)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if($task->user)
                                                    <div class="flex-shrink-0 w-10 h-10">
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="{{ $task->user->profile_photo_url }}"
                                                            alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $task->user->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $task->user->email }}
                                                        </div>
                                                    </div>
                                                @else
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Unassigned Task
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        Feel free to take it!
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $task->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $task->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{ $task->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            @if($task->status == 'To Do')
                                                <button wire:click="inProgressTask({{ $task->id }})" class="text-indigo-600 hover:text-indigo-900">Set in progress</button>
                                            @endif
                                            @if($task->status == "In Progress")
                                                <button wire:click="completeTask({{ $task->id }})" class="text-indigo-600 hover:text-indigo-900">Complete Task</button>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <button wire:click="assign({{ $task->id }})" class="text-indigo-600 hover:text-indigo-900">
                                                @if($task->user_id == auth()->user()->id)
                                                    Unassign
                                                @else
                                                    Assign
                                                @endif
                                            </button>
                                            <button wire:click="edit({{ $task->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                            @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'delete'))
                                                <button wire:click="delete({{ $task->id }})" class="text-indigo-600 hover:text-indigo-900">Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        @if( count($tasks) > 0 )
                        <div wire:click="loadMore()" class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 dark:text-gray-400 duration-200 ease-out bg-gray-200 dark:bg-gray-600 cursor-pointer hover:text-gray-600 hover:bg-gray-300 transition-color md:pl-0 md:justify-center">Load More</div>
                        @else
                            <div class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-100 dark:bg-gray-600 transition-color md:pl-0 md:justify-center">No more entries</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
