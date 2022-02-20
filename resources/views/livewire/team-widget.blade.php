<div class="w-full rounded-lg shadow-sm">
    <div class="w-full h-16 text-gray-700 border-b border-gray-100 dark:border-gray-800 dark:text-white text-lg font-bold flex items-center px-5">
       Team Members
    </div>
    <div class="relative">
        <ul class="relative" wire:poll.1s>
            @include('partials.member-card', ['member' => auth()->user()])
            @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                @if( auth()->user()->id != $member->id)
                    @include('partials.member-card', ['member' => $member, 'key' => $member->id])
                @endif
            @endforeach
        </ul>
    </div>
</div>