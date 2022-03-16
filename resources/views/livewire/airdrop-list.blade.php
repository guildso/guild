<div>
    <div class="flex flex-col mt-5">
        <div class="-my-2 overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-scroll border-b border-gray-200 dark:border-gray-700 border-gray-200 sm:rounded-lg">
                    <div class="relative flex flex-col w-full border border-gray-200 dark:border-gray-800">
                        <div class="w-full px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-900">Payouts</div>
                        @foreach($airdrops as $airdrop)
                            <div class="relative">
                                @if($airdrop->status == 'processing')
                                    <div class="relative" wire:poll.5s="processAirdrop('{{ $airdrop->id }}')"></div>
                                @endif
                            </div>
                            <div x-data="{ showInfo{{ $airdrop->id }}: false }" class="flex flex-col w-full">
                                <div @click="showInfo{{ $airdrop->id }}=!showInfo{{ $airdrop->id }}" wire:click="fetchTransactionInfo('{{ $airdrop->id }}')" class="relative cursor-pointer dark:text-gray-400 dark:hover:text-gray-300 text-gray-600 hover:text-gray-700 flex px-4 justify-between items-center py-3 bg-gray-50 border-b border-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-100">
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
                                           <div class="text-[0.6rem] px-2 py-1 leading-none flex items-center text-center rounded-full uppercase @if($airdrop->status == 'completed'){{ 'bg-green-400' }}@elseif($airdrop->status == 'processing'){{ 'bg-gray-500 animate-pulse' }}@elseif($airdrop->status == 'failed'){{ 'bg-red-400' }}@endif text-white">{{ $airdrop->status }}</div>
                                           
                                        </div>
                                    </div>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div x-show="showInfo{{ $airdrop->id }}" id="airdop-info-container-{{ $airdrop->id }}" class="relative w-full bg-gray-900 text-white">
                                    
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('updateTotalCrypto', event => {
        let updatedValue = parseFloat(document.getElementById('token-amount').innerText) + parseFloat(event.detail.amount);
        document.getElementById('token-amount').innerText = updatedValue.toFixed(9);
    });
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