<div>
    <div class="hidden sm:block">
        <div class="py-8">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900">{{ ucfirst($type) }} notifications</h3>

                <p class="mt-1 text-sm text-gray-600">
                    Add your {{ ucfirst($type) }} Channel Webhook URL here and get Guild notifications!<br>
                    Leave empty in case that you don't want to receive notifications.
                </p>
            </div>
        </div>


        <div class="mt-5 md:mt-0 md:col-span-2" id="{{ $type }}">
            <form wire:submit.prevent="update({{ $type }})">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-gray-700">
                                    Add your {{ ucfirst($type) }} Webhook channel URL and get notifications directly in your {{ ucfirst($type) }} channel!
                                </label>
                            </div>

                            <!-- Webhook -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium text-gray-700" for="name">
                                    {{ ucfirst($type) }} Webhook
                                </label>

                                <input class="block w-full mt-1 rounded-md shadow-sm form-input" id="webhook" type="text"
                                    wire:model="webhook">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="submit" wire:submit.prevent="update({{ $type }})"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>