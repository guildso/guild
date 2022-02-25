<div>
    <form wire:submit.prevent="store()">
        <div class="overflow-hidden sm:rounded-md">
            <div class="py-5 px-1 space-y-3">
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Name
                    </label>
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    <input type="text" class="block w-full mt-1 rounded-md shadow-sm form-input"
                        placeholder="Enter Badge Name" wire:model="name">
                </div>
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Description
                    </label>
                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    <textarea class="block w-full mt-1 rounded-md shadow-sm form-input"
                        wire:model="description"></textarea>
                </div>
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Details
                    </label>
                    @error('details') <span class="text-danger">{{ $message }}</span>@enderror
                    <textarea class="block w-full mt-1 rounded-md shadow-sm form-input"
                        wire:model="details"></textarea>
                </div>
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Color
                    </label>
                    @error('color') <span class="text-danger">{{ $message }}</span>@enderror
                    <select class="block w-full mt-1 rounded-md shadow-sm form-input"
                    placeholder="Enter Badge Color" wire:model="color">
                        <option value="" selected>Select a color</option>
                        <option value="pink">Pink</option>
                        <option value="purple">Purple</option>
                        <option value="indigo">Indigo</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="yellow">Yellow</option>
                        <option value="red">Red</option>
                        <option value="gray">Gray</option>
                    </select>
                </div>
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Award Message
                    </label>
                    @error('award_message') <span class="text-danger">{{ $message }}</span>@enderror
                    <input type="text" class="block w-full mt-1 rounded-md shadow-sm form-input"
                        placeholder="Enter Badge Award Message" wire:model="award_message">
                </div>
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Type
                    </label>
                    <span class="text-xs text-gray-500">Choose the category that you want to create a badge for</span>
                    @error('requirement_class') <span class="text-danger">{{ $message }}</span>@enderror
                    <select wire:model="requirement_class" class="block w-full mt-1 rounded-md shadow-sm form-input">
                        <option value="" selected>Select a category</option>
                        <option value="team">Team</option>
                        <option value="shift">Shift</option>
                        <option value="task">Task</option>
                        <option value="feed">Feed</option>
                    </select>
                </div>
                <div class="relative w-full">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200" for="current_password">
                        Badge Value
                    </label>
                    <span class="text-xs text-gray-500">Choose the value for the specific category that you want the badge to be awared after</span>
                    @error('requirement_value') <span class="text-danger">{{ $message }}</span>@enderror
                    <input type="text" class="block w-full mt-1 rounded-md shadow-sm form-input"
                        placeholder="Enter Badge Value" wire:model="requirement_value">
                </div>
            </div>

            <div class="flex items-center justify-end pb-10 text-right">

                <button wire:submit.prevent="store()"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>