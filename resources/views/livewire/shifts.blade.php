<div>
    <form wire:submit.prevent="toggleShift()">
        <input type="hidden" wire:model="task_id">
        <button wire:submit.prevent="toggleShift()"
            class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out @if(auth()->user()->isOnShift()){{ 'bg-green-400 hover:bg-green-500 active:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green' }}@else{{ 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray' }}@endif border border-transparent rounded-md disabled:opacity-25"
            x-data="{ platform: '' }"
            x-init="platform = window.navigator.platform">
            <span class="flex items-center h-full pr-2 mr-2 space-x-1 leading-none border-r border-white border-opacity-25">
                <span x-show="platform == 'MacIntel'" x-cloak>
                    <svg class="w-2.5 h-2.5 text-white fill-current" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g transform="translate(-19)" fill-rule="nonzero"><path d="M69 38h-4V24h4c6.627 0 12-5.373 12-12S75.627 0 69 0 57 5.373 57 12v4H43v-4c0-6.627-5.373-12-12-12S19 5.373 19 12s5.373 12 12 12h4v14h-4c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12v-4h14v4c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12zm-4-26a4 4 0 114 4h-4v-4zm-34 4a4 4 0 114-4v4h-4zm4 34a4 4 0 11-4-4h4v4zm8-12V24h14v14H43zm26 16a4 4 0 01-4-4v-4h4a4 4 0 110 8z" /></g></g></svg>
                </span>
                <span x-show="platform != 'MacIntel'" class="text-xs font-bold tracking-tighter" x-cloak>
                    CTRL
                </span>
                <span>
                    <svg class="w-2.5 h-2.5 text-white fill-current" viewBox="0 0 58 63" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g transform="translate(-6)" fill-rule="nonzero"><g transform="translate(6)"><path d="M43.558 14.733H17.65l5.838-5.805a5.02 5.02 0 000-7.11c-1.968-1.957-5.182-1.957-7.15 0l-14.43 14.35C.99 17.146.467 18.386.467 19.69c0 1.305.524 2.61 1.443 3.523l14.43 14.35c1.902 1.892 5.181 1.892 7.149 0 .918-.978 1.443-2.218 1.443-3.522 0-1.305-.525-2.61-1.443-3.523l-5.838-5.805h25.908c2.165 0 3.936 1.761 3.936 3.914v19.83c0 2.152-1.771 3.913-3.936 3.913H14.436c-2.164 0-3.935-1.761-3.935-3.914v-5.675c0-2.74-2.23-5.022-5.05-5.022S.4 39.977.4 42.78v5.675c0 7.632 6.297 13.894 13.97 13.894h29.057c7.674 0 13.971-6.262 13.971-13.894V28.692c.131-7.697-6.166-13.959-13.84-13.959z" transform="matrix(1 0 0 -1 0 62.7)"/></g></g></g></svg>
                </span>
            </span>
            {{ $action }} Shift
        </button>
    </form>
</div>
