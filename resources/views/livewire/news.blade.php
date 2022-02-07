<div>
    <div class="pb-12">
        <div class="max-w-4xl mr-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">

                    <div class="mt-5 md:mt-0 md:col-span-3">

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <h1 class="text-6xl font-black">Company News</h1>
                                        <p class="mt-3 mb-4 text-lg text-gray-700">Here you can update some text about the latest news happening in your guild.</p>

                                <textarea class="block w-full rounded-md shadow-sm form-input" wire:model="news"></textarea>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">

                <button wire:click="saveNews()" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    Save
                </button>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
