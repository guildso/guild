<nav class="fixed top-0 z-10 flex flex-col items-start justify-between w-48 flex-shrink-0 min-h-screen h-full border-r border-gray-100 dark:border-gray-800">

    <div class="relative flex flex-col w-full">
        <a class="flex justify-start w-full pt-5 pl-2" href="/">
            
            <svg class="w-auto text-gray-900 dark:text-gray-100 fill-current h-7" viewBox="0 0 4705 1479" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g><path d="M642.013 1309.693l-41.978-19.522c-141.32-65.735-467.021-255.734-439.302-599.21 14.258-151.09 23.272-252.296 29.06-319.72l5.71-66.765 446.53-137.92 446.527 137.92 5.712 66.783c4.245 49.511 10.249 117.232 18.745 209.006H913.264c-4.468-48.398-8.22-89.865-11.361-125.244l-259.87-80.265-259.872 80.265c-5.594 63.132-13.131 145.767-23.291 253.286-15.462 191.766 168.32 319.934 283.084 380.657 90.57-48.02 224.132-138.345 268.744-270H641.89V659.83H1120.445c.839 8.922 1.698 18.028 2.576 27.322 27.992 346.838-297.711 537.205-439.05 602.998l-41.958 19.542zm601.639-1067.63l-3.031-57.169L642.05.005 43.58 185.127l-3.107 55.245c-.952 15.482-7.013 105.79-38.288 436.718-32.77 405.99 309.406 680.41 612.42 791.637l27.429 10.063 27.389-10.063c303.014-111.267 645.132-386.348 612.148-795.444-29.585-312.649-36.5-409.134-37.918-431.22z"></path><path d="M2593 421.75l-102.5 105c-58.75-56.25-146.25-87.5-222.5-87.5-187.5 0-301.25 142.5-301.25 322.5 0 143.75 83.75 292.5 301.25 292.5 68.75 0 128.75-15 197.5-70v-155h-223.75v-147.5h375v368.75c-86.25 98.75-195 157.5-348.75 157.5-328.75 0-462.5-216.25-462.5-446.25C1805.5 515.5 1959.25 288 2268 288c117.5 0 235 45 325 133.75zm151.25 150h152.5v322.5c0 93.75 51.25 165 148.75 165 93.75 0 157.5-78.75 157.5-172.5v-315h151.25v617.5H3218l-10-83.75c-63.75 62.5-122.5 92.5-208.75 92.5-147.5 0-255-111.25-255-302.5V571.75zm897.5-2.5V1188h-152.5V569.25h152.5zM3475.5 398c0-118.75 180-118.75 180 0s-180 118.75-180 0zm303.75-83.75h151.25V1188h-151.25V314.25zm583.75 385c-97.5 0-175 68.75-175 180 0 107.5 77.5 181.25 175 181.25 96.25 0 178.75-70 178.75-181.25 0-107.5-82.5-180-178.75-180zm188.75-385h152.5V1188h-142.5l-10-85c-47.5 73.75-123.75 98.75-198.75 98.75-181.25 0-317.5-120-317.5-322.5 0-212.5 133.75-322.5 313.75-322.5 65 0 166.25 35 202.5 98.75V314.25z" fill-rule="nonzero"></path></g></g></svg>
        </a>

        <div class="flex flex-col items-start w-full mt-6 space-y-0.5 w-full pr-3">

                <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                   🏠 <span class="pl-2 text-sm">Home</span>
                </a>

                <a href="{{ route('shifts') }}" class="@if(request()->routeIs('shifts')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                    🕗 <span class="pl-2 text-sm">My Shift</span>
                </a>

                <a href="{{ route('tasks') }}" class="@if(request()->routeIs('tasks')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                    ✅ <span class="pl-2 text-sm">Tasks</span>
                </a>

                <a href="{{ route('badges') }}" class="@if(request()->routeIs('badges')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                    🥇 <span class="pl-2 text-sm">Badges</span>
                </a>

                <a href="{{ route('airdrop') }}" class="@if(request()->routeIs('airdrop')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                    💸 <span class="pl-2 text-sm">AirDrop</span>
                </a>

                @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                    <a href="{{ route('news') }}" class="@if(request()->routeIs('news')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                        📰 <span class="pl-2 text-sm">News</span>
                    </a>

                    <a href="https://docs.guild.so" target="_blank" class="@if(request()->routeIs('guide')){{ 'text-gray-600 dark:text-gray-100 dark:bg-gray-800 bg-gray-100' }}@else{{ 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-400' }}@endif flex items-center w-full px-3 rounded-md py-1.5 text-base font-semibold">
                        📖 <span class="pl-2 text-sm">Documentation</span>
                    </a>
                @endif

        </div>

        <div class="relative mt-5 w-48 pr-3 border-t border-gray-200 dark:border-gray-700 text-sm pt-5 pr-3">
            <div x-on:click="app.appearance_menu=!app.appearance_menu;" class="rounded-md group flex justify-between items-center px-2 group py-2 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer text-gray-400 hover:text-gray-500  dark:hover:text-gray-300 font-medium">
                
                <div x-show="app.appearance=='light'" class="w-full h-full flex justify-between items-center" x-cloak>
                    <div class="flex items-center h-full">
                        <svg class="w-6 h-6 pr-1.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                        <span>Light Mode</span>
                    </div>
                    <svg class="w-4 h-4 opacity-0 text-gray-400 group-hover:opacity-100 transform -translate-x-3 group-hover:-translate-x-2 transition-all ease-out duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>

                <div x-show="app.appearance=='dark'" class="w-full h-full flex justify-between items-center" x-cloak>
                    <div class="flex items-center h-full">
                        <svg class="w-6 h-6 pr-1.5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <span>Dark Mode</span>
                    </div>
                    <svg class="w-4 h-4 opacity-0 text-gray-400 group-hover:opacity-100 transform -translate-x-3 group-hover:-translate-x-2 transition-all ease-out duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>

                <div x-show="app.appearance=='auto'" class="w-full h-full flex justify-between items-center" x-cloak>
                    <div class="flex items-center h-full">
                        <svg  class="w-6 h-6 pr-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="none"><path d="M9 20h6m4-4H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2zm-7 0v4-4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                        <span>System</span>
                    </div>
                    <svg class="w-4 h-4 opacity-0 text-gray-400 group-hover:opacity-100 transform -translate-x-3 group-hover:-translate-x-2 transition-all ease-out duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>

            </div>
            <div class="w-full relative">
                <div x-show="app.appearance_menu"
                    x-on:click.away="app.appearance_menu=false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="w-full h-auto bg-white dark:bg-gray-800 shadow-lg border origin-top select-none dark:border-gray-700 border-gray-100 rounded-lg overflow-hidden absolute top-0 mt-1 z-30"
                    x-cloak>

                    <div x-on:click="app.appearance='light'; app.appearance_menu=false" class="group flex justify-between items-center px-2 group py-2 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 font-medium">
                        <div class="flex items-center h-full">
                            <svg class="w-6 h-6 pr-1.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>
                            <span>Light Mode</span>
                        </div>
                    </div>

                    <div x-on:click="app.appearance='dark'; app.appearance_menu=false"  class="group flex justify-between items-center px-2 group py-2 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 font-medium">
                        <div class="flex items-center h-full">
                            <svg class="w-6 h-6 pr-1.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <span>Dark Mode</span>
                        </div>
                    </div>

                    <div x-on:click="app.appearance='auto'; app.appearance_menu=false" class="group flex justify-between items-center px-2 group py-2 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 font-medium">
                        <div class="flex items-center h-full">
                            <svg  class="w-6 h-6 pr-2 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="none" stroke="none"><path d="M9 20h6m4-4H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2zm-7 0v4-4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                            <span>System</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Bottom Items -->
    <div class="relative w-full fixed bottom-0 p-3 pl-0 space-y-3">

        <!-- Shift Start/Stop -->
        <div class="relative w-full">
            @livewire('shifts')
        </div>

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button @click="app.user_menu_open=!app.user_menu_open"
                    :class="{ 'dark:bg-gray-700 bg-gray-100' : app.user_menu_open }"
                class="flex items-center justify-between border-gray-200 dark:border-gray-700 border w-full px-2.5 py-2 rounded-md text-sm text-gray-400 transition duration-150 ease-in-out hover:text-gray-600 dark:hover:text-gray-200 focus:outline-none hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="relative flex items-center font-semibold">
                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <div class="flex flex-col items-start">
                        <span class="font-semibold leading-none text-xs truncate w-24 text-left">{{ Auth::user()->name }}</span>
                        <span class="text-xs mt-0.5 leading-none @if(auth()->user()->isOnShift()){{ 'text-green-400' }}@endif">
                            @if(auth()->user()->isOnShift())
                                On Shift
                            @else
                                Not on Shift
                            @endif
                        </span>
                    </div>
                </div>
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </button>
        @else
            <button class="flex items-center w-full px-5 py-3 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                <div>{{ Auth::user()->name }}</div>

                <div class="ml-1">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        @endif

        <div x-show="app.user_menu_open" class="fixed bottom-0 transform -translate-y-16 w-64 h-auto overflow-hidden origin-bottom-left"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                @click.away="app.user_menu_open=false"
                @click="app.user_menu_open = false" x-cloak>

                <div class="py-1 bg-white dark:bg-gray-700 rounded-md mb-2 border dark:border-gray-800 border-gray-100">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100 dark:border-gray-600"></div>

                    <!-- Guild Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Guild Settings -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-jet-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                {{ __('Create a New Team') }}
                            </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100 dark:border-gray-600"></div>

                        <!-- Guild Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Team') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" />
                        @endforeach

                        <div class="border-t border-gray-100 dark:border-gray-600"></div>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
            </div>

        </div>

    </div>
    <!-- End Bottom Items -->

</nav>
