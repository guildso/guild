<div class="p-5 pt-0">

        <div class="flex w-full space-x-8">
            <!-- Main Start Shift Top Bar -->
            <div class="w-1/2 mx-0 mb-5 overflow-hidden bg-white border border-gray-100 rounded-lg shadow-sm">
                <div class="flex flex-col">
                    <form wire:submit.prevent="store()" class="relative flex items-center p-5 space-x-4 lg:space-x-2">
                        <a href="#_" class="relative flex-shrink-0 w-10 h-10 lg:w-12 lg:h-12">
                            <img class="w-10 h-10 rounded-full lg:w-12 lg:h-12" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            <span class="absolute bottom-0 right-0 w-4 h-4 mb-0 mr-0 @if($shift) bg-green-400 @else bg-gray-300 @endif border-2 border-white rounded-full"></span>
                        </a>
                        <input wire:model="body" type="text" class="w-full h-12 px-3 text-xl border-0 focus:outline-none focus:border-0 focus:ring-0" placeholder="What's happening?">
                        <button wire:submit.prevent="store()" class="inline-flex items-center justify-center flex-shrink-0 w-auto px-4 py-2 text-xs font-semibold tracking-wide text-center text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Post</button>
                    </form>

                    <div class="flex justify-between items-center p-5 space-x-4 @if($shift){{ 'bg-green-400' }}@else{{ 'bg-gray-200' }}@endif">
                        @if($shift)
                            <p class="pl-1 font-bold text-white">You are currently on shift</p>
                        @else
                            <p class="pl-1 font-semibold text-gray-500">You are currently not on shift</p>
                        @endif
                        <div class="border border-green-300 rounded-md">
                        {{-- @livewire('shifts') --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Start Shift Top Bar -->

            <div class="w-1/2 pt-2 mx-0" wire:poll.10ms>
                <h1 class="pt-2 pb-6 text-lg font-bold text-gray-700 md:text-xl">📰 Latest Company News</h1>
                <div class="h-24 text-sm text-gray-600 bg-white border border-gray-100 rounded-lg shadow-sm">
                    @php $company = \App\Models\Company::first(); @endphp
                    @if(isset($company->news))
                        <p class="p-5">{{ $company->news }}</p>
                    @else

                            <p class="p-5">No latest company news posted.
                            @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                                <a href="/news" class="text-green-500 underline">Click here to add company news</a>
                            @endif
                            </p>
                    @endif
                </div>
            </div>

        </div>

            <div class="flex justify-between mx-auto mt-5 space-x-8">
                <div class="w-1/2">
                    <div class="flex items-center justify-between px-1">
                        <h1 class="text-lg font-bold text-gray-700 md:text-xl">🍕 <span class="ml-2">Your Company Feed</span></h1>
                    </div>
                    <div>
                        @livewire('posts')
                    </div>
                </div>
                <div class="w-1/2 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between px-1 pb-6">
                        <h1 class="text-lg font-bold text-gray-700 md:text-xl">⚔️ <span class="ml-2">Guild Members</span></h1>
                    </div>
                        <div class="relative">
                            <ul class="space-y-6" wire:poll.10ms>
                                @include('partials.member-card', ['member' => auth()->user()])
                                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                                    @if( auth()->user()->id != $member->id)
                                        @include('partials.member-card', ['member' => $member, 'key' => $member->id])
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
            </div>
        {{-- @if( count($shifts) > 0 )
            <div wire:click="loadMore()" class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-200 cursor-pointer hover:text-gray-600 hover:bg-gray-300 transition-color md:pl-0 md:justify-center">Load More</div>
            @else
                <div class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-100 transition-color md:pl-0 md:justify-center">No more entries</div>
            @endif --}}


    </div>
