<div  x-data="{ step: @entangle('step') }">

    <section x-show="step==0"
        x-transition:enter="transition ease-in duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="flex flex-col justify-center h-screen"
        x-cloak>
        <div  class="flex flex-col items-start mx-auto space-y-6 max-w-7xl">
            <h1 class="text-4xl text-gray-100 font-bold">Welcome to <span class="text-purple-500">Guild</span></h1>
            <p class="text-lg text-gray-300">Let's configure a few things and get your guild setup. This will only take 30 seconds.</p>
            <div wire:click="nextStep" class="inline-flex items-center px-5 py-3 pl-8 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-purple-600 border border-transparent rounded-md cursor-pointer hover:bg-purple-500 active:bg-purple-700 focus:outline-none focus:border-purple-600 focus:shadow-outline-purple disabled:opacity-25"><span class="mr-2 -ml-4">🚀</span> Let's Do This</div>
        </div>
    </section>

    <section x-show="step==1"
        x-transition:enter="transition ease-in duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="flex flex-col justify-center h-screen" x-cloak>
        <div  class="flex flex-col items-start mx-auto space-y-6 max-w-7xl">
            <h1 class="text-4xl text-gray-100 font-bold">About Your <span class="text-purple-500">Company</span></h1>
            <p class="text-lg text-gray-300">First, enter a little information about your awesome company.</p>


            <div class="w-full">
                <x-jet-label for="company_name" value="{{ __('Company Name') }}" />
                <x-jet-input id="company_name" wire:model="company_name" class="block w-full mt-1" type="email" name="email" :value="old('company_name')" required />
                @error('company_name') <span class="my-1 text-sm font-medium text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full mt-4">
                <x-jet-label for="website" value="{{ __('Company Website') }}" />
                <x-jet-input id="website" wire:model="website" class="block w-full mt-1" type="text" name="website" />
            </div>

            <div class="flex space-x-4">
                <div @click="step--" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-gray-200 uppercase transition duration-150 ease-in-out bg-gray-700 hover:bg-gray-600 border border-transparent rounded-md cursor-pointer">Previous</div>
                <div wire:click="nextStep" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-purple-600 border border-transparent rounded-md cursor-pointer hover:bg-purple-500 active:bg-purple-700 focus:outline-none focus:border-purple-600 focus:shadow-outline-purple disabled:opacity-25">Next Step</div>
            </div>
        </div>
    </section>

    <section x-show="step==2"
        x-transition:enter="transition ease-in duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="flex flex-col justify-center h-screen"
        x-cloak>

        <div  class="flex flex-col items-start mx-auto space-y-6 max-w-7xl">
            <h1 class="text-4xl text-gray-100 font-bold">Create Your <span class="text-purple-500">Account</span></h1>
            <p class="text-lg text-gray-300">Next, create your account. This will give you access to your guild dashboard.</p>

            <div class="w-full">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" wire:model="name" class="block w-full mt-1" type="text" name="name" required />
                @error('name') <span class="my-1 text-sm font-medium text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" wire:model="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
                @error('email') <span class="my-1 text-sm font-medium text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" wire:model="password" class="block w-full mt-1" type="password" name="password" required />
                @error('password') <span class="my-1 text-sm font-medium text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="w-full mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" wire:model="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required />
                @error('password_confirmation') <span class="my-1 text-sm font-medium text-red-400">{{ $message }}</span> @enderror
            </div>

            <div class="flex space-x-4">
                <div @click="step--" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-gray-200 uppercase transition duration-150 ease-in-out bg-gray-700 hover:bg-gray-600 border border-transparent rounded-md cursor-pointer">Previous</div>
                <div wire:click="nextStep" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-purple-600 border border-transparent rounded-md cursor-pointer hover:bg-purple-500 active:bg-purple-700 focus:outline-none focus:border-purple-600 focus:shadow-outline-purple disabled:opacity-25">Next Step</div>
            </div>
        </div>
    </section>

    <section x-show="step==3"
        x-transition:enter="transition ease-in duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="flex flex-col justify-center h-screen" x-cloak>
        <div  class="flex flex-col items-start mx-auto space-y-6 max-w-7xl">
            <h1 class="text-4xl text-gray-100 font-bold">Finsh Your <span class="text-purple-500">Setup</span></h1>
            <p class="text-lg text-gray-300">Awesome 🙌, click on finish to complete the install and login to your dashboard.</p>
            <div class="flex space-x-4">
                <div @click="step--" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-gray-200 uppercase transition duration-150 ease-in-out bg-gray-700 hover:bg-gray-600 border border-transparent rounded-md cursor-pointer">Previous</div>
                <div wire:click="finish" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-purple-600 border border-transparent rounded-md cursor-pointer hover:bg-purple-500 active:bg-purple-700 focus:outline-none focus:border-purple-600 focus:shadow-outline-purple disabled:opacity-25">Finish</div>
            </div>
        </div>
    </section>

        <div class="fixed bottom-0 z-50 flex items-center justify-between w-full max-w-sm mx-auto mb-10 ml-1">
            <div class="w-4 h-4 bg-purple-500 rounded-full"></div>
            <div class="absolute w-full h-1 bg-purple-500 rounded-full top-1/2 -mt-0.5"></div>
            <div :class="{ 'bg-purple-500 border-transparent' : step >= 1, 'border-purple-500 bg-gray-900' : step < 1 }" class="relative flex items-center justify-center w-4 h-4 border-4 rounded-full"></div>
            <div :class="{ 'bg-purple-500 border-transparent' : step >= 2, 'border-purple-500 bg-gray-900' : step < 2 }" class="relative flex items-center justify-center w-4 h-4 border-4 rounded-full"></div>
            <div :class="{ 'bg-purple-500 border-transparent' : step >= 3, 'border-purple-500 bg-gray-900' : step < 3 }" class="relative flex items-center justify-center w-4 h-4 border-4 rounded-full"></div>
        </div>

</div>
