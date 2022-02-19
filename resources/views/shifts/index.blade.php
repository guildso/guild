<x-app-layout>

    <div class="pb-12">
        <div class="max-w-4xl mr-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">

                    <div class="mt-5 md:mt-0 md:col-span-3">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                            
                            <p class="mt-8 mb-4 text-base text-gray-700 dark:text-gray-300">This is your shift page. Here you can view logs of your shifts, and view some metrics about your shift.</p>
                            <h3 class="my-2 text-base font-bold text-green-500">Total hours contributed to your guild: <span>{{  auth()->user()->totalHoursWorked() }}</span></h3>
                            

                            <div class="flex items-center justify-between">
                                <div class="block text-sm font-medium dark:text-gray-400 text-gray-700">
                                    @if(auth()->user()->isOnShift())
                                        <span class="text-green-500">Currently on shift. Click the stop shift button to end shift
                                    @else
                                        <span>Currently not on shift. Click the start shift button to begin shift.</span>
                                    @endif
                                </div>

                                @livewire('shifts')
                            </div>
                    </div>
                </div>
            </div>
            @livewire('shift-logs')
        </div>
    </div>
</x-app-layout>
