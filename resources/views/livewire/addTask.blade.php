<div>
    <form wire:submit.prevent="store()">
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label class="block text-sm font-medium text-gray-700" for="current_password">
                            Task Name
                        </label>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        <div class="relative flex items-center emoji-input">
                            <input type="text" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Task Name" wire:model="name">
                            <svg class="absolute right-0 w-6 h-6 mr-3 text-gray-300 cursor-pointer mt-0.5 emoji-trigger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label class="block text-sm font-medium text-gray-700" for="current_password">
                            Task Description
                        </label>
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        <div class="relative flex items-center emoji-input">
                            <textarea class="block w-full mt-1 rounded-md shadow-sm form-input" wire:model="description"></textarea>
                            <svg class="absolute right-0 w-6 h-6 mr-3 text-gray-300 cursor-pointer mt-0.5 emoji-trigger" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">

                <button wire:submit.prevent="store()"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
