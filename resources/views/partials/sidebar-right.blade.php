<div class="relative border-l border-gray-100 dark:border-gray-800">
    {{-- Company News --}}
    <div class="w-full pt-2 mx-0" wire:poll.10ms>
        <h1 class="pt-2 pb-6 text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">📰 Latest Company News</h1>
        <div class="h-24 text-sm text-gray-600 bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-lg shadow-sm">
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


    {{-- Team Members --}}
    <div class="w-full rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-1 pb-6">
            <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">⚔️ <span class="ml-2">Guild Members</span></h1>
        </div>
        <div class="relative">
            <ul class="space-y-6" wire:poll.10ms>
                @include('partials.member-card', ['member' => auth()->user()])
                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                @if( auth()->user()->id != $member->id)
                @include('partials.member-card', ['member' => $member, 'key' => $member->id])
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>