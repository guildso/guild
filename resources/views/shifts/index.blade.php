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

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <h1 class="font-black text-8xl">Your Shift</h1>
                                        <p class="mt-3 text-lg text-gray-700">This is your shift page. Here you can view logs of your shifts, and view some metrics about your shift.</p>
                                        <h3 class="my-2 text-base font-bold text-green-500">Total hours contributed to your guild: <span>{{  auth()->user()->totalHoursWorked() }}</span></h3>
                                        <label class="block text-sm font-medium text-gray-700" for="current_password">
                                            Currently not on shift.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">
                                @livewire('shifts')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('shift-logs')
        </div>
    </div>
</x-app-layout>
