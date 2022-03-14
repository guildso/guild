<div>
    <div class="flex flex-col mt-5">
        <div class="-my-2 overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-scroll border-b border-gray-200 dark:border-gray-700 border-gray-200 sm:rounded-lg">


                    <div class="relative flex flex-col w-full border border-gray-200 dark:border-gray-800">
                        <div class="w-full px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-900">Payouts</div>
                        @foreach($airdrops as $airdrop)
                            <div x-data="{ show:false }" class="flex flex-col w-full">
                                <div @click="show=!show" wire:click="fetchTransactionInfo('{{ $airdrop->id }}')" class="relative cursor-pointer dark:text-gray-400 dark:hover:text-gray-300 text-gray-600 hover:text-gray-700 flex px-4 justify-between items-center py-3 bg-gray-50 border-b border-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-100">
                                    <div class="relative flex justify-between w-full">
                                        <div class="flex flex-col flex-1">
                                            <div class="font-medium text-sm">{{ $airdrop->created_at->format('F j, Y h:i A') }}</div>
                                            <div class="text-sm">by {{ $airdrop->user->name }}</div>
                                        </div>
                                        <div class="flex flex-col justify-start flex-1">
                                            <div class="text-sm font-medium">Amount:</div>
                                            <div class="text-green-400">{{ $airdrop->amount }}</div>
                                        </div>
                                        <div class="flex flex-col justify-start items-start flex-1">
                                           <div class="text-sm font-medium">Status:</div>
                                           <div class="text-[0.6rem] px-2 py-1 leading-none flex items-center text-center rounded-full uppercase @if($airdrop->status == 'complete'){{ 'bg-green-400' }}@elseif($airdrop->status == 'processing'){{ 'bg-gray-500' }}@elseif($airdrop->status == 'failed'){{ 'bg-red-400' }}@endif text-white">{{ $airdrop->status }}</div>
                                           
                                        </div>
                                    </div>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div x-show="show" id="airdop-info-container-{{ $airdrop->id }}" class="relative w-full bg-gray-900 text-white">
                                    
                                    <div id="airdop-info-loader-{{ $airdrop->id }}" class="flex w-full h-full py-5 items-center justify-center">
                                        <div class="flex text-gray-300 items-center text-xs">
                                            <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            <span>Fetching Transaction Info</span>
                                        </div>
                                    </div>
                                    <div id="airdop-info-content-{{ $airdrop->id }}" class="relative whitespace-pre-wrap overflow-scroll pt-6 hidden px-5 text-sm font-mono w-full max-w-full" style="max-width:730px">

                                    </div>
                                    <div class="flex px-4 py-3 bg-gray-700">
                                        <div class="flex items-center">
                                            <a target="_blank" href="https://solscan.io/tx/{{ $airdrop->transaction }}" class="font-semibold text-xs hover:underline flex items-center">
                                                <span>View this Transaction On Solscan</span>
                                                <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if( count($airdrops) > 0 )
                            <div wire:click="loadMore()" class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 dark:text-gray-400 duration-200 ease-out bg-gray-200 dark:bg-gray-600 cursor-pointer hover:text-gray-600 hover:bg-gray-300 transition-color md:pl-0 md:justify-center">Load More</div>
                        @else
                            <div class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-100 dark:bg-gray-600 transition-color md:pl-0 md:justify-center">No more entries</div>
                        @endif
                    </div>

                    {{-- <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                    Requested Time
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                    Amount
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-3 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                    Wallet
                                </th>
                                @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'airdrop'))
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                        User
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 dark:text-gray-300 uppercase">
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700" wire:poll.1s>
                            @foreach($airdrops as $airdrop)
                                <tr>
                                    <td class="px-3 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-200">{{ $airdrop->created_at->format('F j, Y h:i A') }}</div>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <strong>{{ $airdrop->amount }}</strong>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ ucfirst($airdrop->status) }}
                                        @if ($airdrop->transaction)
                                            <p class="text-xs text-gray-300">
                                                <a href="https://solscan.io/tx/{{ $airdrop->transaction }}" target="_blank">Transaction</a>
                                            </p>
                                        @endif
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap truncate w-64">
                                        {{ $airdrop->wallet }}
                                    </td>
                                    @if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'airdrop'))
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $airdrop->user->name }}
                                        </td>
                                        @if ($airdrop->status == 'requested')
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <button wire:click="approve({{ $airdrop->id }})"
                                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray border border-transparent rounded-md disabled:opacity-25">
                                                    Approve
                                                </button>
                                            </td>
                                        @else
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                <button class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray border border-transparent rounded-md disabled:opacity-25" disabled>
                                                    {{ ucfirst($airdrop->status) }}
                                                </button>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('displayLogContent', event => {
        let airDropInfoLoader = document.getElementById('airdop-info-loader-' + event.detail.id);
        let airDropInfoContent = document.getElementById('airdop-info-content-' + event.detail.id);

        airDropInfoContent.innerHTML = event.detail.content;
        airDropInfoLoader.classList.add('hidden');
        airDropInfoContent.classList.remove('hidden');
    });

    window.addEventListener('errorFetchingLogContent', event => {
        let airDropInfoLoader = document.getElementById('airdop-info-loader-' + event.detail.id);
        let airDropInfoContent = document.getElementById('airdop-info-content-' + event.detail.id);

        airDropInfoContent.innerHTML = event.detail.message + '<br><br>';
        airDropInfoLoader.classList.add('hidden');
        airDropInfoContent.classList.remove('hidden');
    });
</script>