<div>
    <form wire:submit.prevent="update()">
        <input type="hidden" wire:model="task_id">
        <div class="overflow-hidden sm:rounded-md">
            <div class="px-1 py-5 sm:py-6">
                        <label class="block text-sm font-medium text-gray-700" for="current_password">
                            Task Name
                        </label>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        <input type="text" class="block w-full mt-1 rounded-md shadow-sm form-input"
                            placeholder="Enter Task Name" wire:model="name">

                        <label class="block mt-6 text-sm font-medium text-gray-700" for="current_password">
                            Task Description
                        </label>
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        <textarea class="block w-full mt-1 rounded-md shadow-sm form-input"
                            wire:model="description"></textarea>

            </div>

            <div class="flex items-center justify-end py-3 text-right px-1">

                <button wire:submit.prevent="update()"
                    class="inline-flex items-center px-4 py-2 mr-10 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    Save
                </button>
                <button wire:submit.prevent="cancel()"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-400 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                Cancel
            </button>
            </div>
        </div>
    </form>
</div>