<div class="w-full mx-0" wire:poll.10ms>
    <div class="w-full h-16 text-gray-700 border-b border-gray-100 dark:border-gray-800 dark:text-white text-lg font-bold flex items-center px-5">
        Latest Company News
    </div>
        <div class="h-24 text-sm text-gray-600 dark:text-gray-300 border-b dark:border-gray-800 border-gray-100">
            @php $company = \App\Models\Company::first(); @endphp
            @if(isset($company->news))
                <p class="p-5">{{ $company->news }}</p>
            @else

                    <p class="p-5">No latest company news posted.
                    @if(auth()->user()->hasTeamRole(auth()->user()->currentTeam, 'manager'))
                        <a href="/news" class="text-green-500 underline">Click here to add company news</a>
                    @endif
                    </p>
            @endif
        </div>
    </div>