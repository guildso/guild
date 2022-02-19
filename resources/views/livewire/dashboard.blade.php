<div class="w-full">

    <div class="flex w-full space-x-8">
        <!-- Main Start Shift Top Bar -->
        <div class="w-full mx-0 overflow-hidden bg-white dark:bg-gray-900">
            <div class="flex flex-col">
                <form wire:submit.prevent="store()" class="relative flex items-center p-5 space-x-4 lg:space-x-2">
                    <a href="#_" class="relative flex-shrink-0 w-10 h-10 lg:w-12 lg:h-12">
                        <img class="w-10 h-10 rounded-full lg:w-12 lg:h-12" src="{{ auth()->user()->profile_photo_url }}" alt="">
                        <span class="absolute bottom-0 right-0 w-4 h-4 mb-0 mr-0 @if($shift) bg-green-500 @else bg-gray-300 @endif border-2 border-white rounded-full"></span>
                    </a>
                    <input wire:model="body" type="text" class="w-full h-12 px-3 text-xl border-0 text-gray-800 dark:text-gray-100 focus:outline-none bg-white dark:bg-gray-900 focus:border-0 focus:ring-0" placeholder="What's happening?">
                    <button wire:submit.prevent="store()" class="inline-flex items-center justify-center flex-shrink-0 w-auto px-4 py-2 text-xs font-semibold tracking-wide text-center text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Post</button>
                </form>

                <div class="flex justify-between items-center p-5 space-x-4 @if($shift){{ 'bg-green-500' }}@else{{ 'bg-gray-100 dark:bg-gray-800' }}@endif">
                    @if($shift)
                    <p class="pl-1 font-bold text-white">You are currently on shift</p>
                    @else
                    <p class="pl-1 font-semibold text-gray-500 dark:text-gray-400">You are currently not on shift</p>
                    @endif
                    <div class="border border-green-300 rounded-md">
                        {{-- @livewire('shifts') --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start Shift Top Bar -->

    </div>

    <div class="flex justify-between mx-auto space-x-8">
        <div class="w-full">
            <div>
                @livewire('posts')
            </div>
        </div>
    </div>


</div>
