<div class="pt-3">
    <p class="mt-3 mb-4 text-base text-gray-700 dark:text-gray-300">Here you can update some text about the latest news happening in your guild.</p>

    <textarea class="block w-full rounded-md shadow-sm form-input" wire:model="news"></textarea>
    <div class="flex items-center justify-end py-3 text-right">

        <x-jet-button wire:click="saveNews()">
        
            Save
        </x-jet-button>
    </div>
</div>
