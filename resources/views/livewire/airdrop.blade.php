<div>
    <div class="pb-12">
        <div class="max-w-4xl">
            <div class="mt-10 sm:mt-0">

                <div class="overflow-hidden sm:rounded-md">
                
                    <div wire:ignore class="px-1 pt-5">
                        <h1 class="text-6xl mb-5 font-black text-gray-700 dark:text-white">Payouts</h1>
                        <p class="mt-3 mb-4 text-lg text-gray-700 dark:text-gray-400">Connect your Phantom wallet and request a payout via your company solana token.</p>
                        
                        <div id="wallet-loading-container" class="w-full h-64 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                            <div id="wallet-loading"  class="flex items-center text-gray-500 dark:text-gray-300 font-medium">
                                <svg class="animate-spin -ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Loading</span>
                            </div>
                            <div id="wallet-login" class="hidden w-full h-full flex items-center justify-center">
                                <button 
                                    id="login-button" 
                                    onclick="phantomLogin()" 
                                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                        <svg class="w-10 h-10 -ml-1.5 mr-2.5" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="a"><stop stop-color="#534BB1" offset="0%"/><stop stop-color="#551BF9" offset="100%"/></linearGradient><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="b"><stop stop-color="#FFF" offset="0%"/><stop stop-color="#FFF" stop-opacity=".82" offset="100%"/></linearGradient></defs><g fill-rule="nonzero" fill="none"><circle fill="url(#a)" cx="17" cy="17" r="17"/><path d="M29.17 17.207h-2.997c0-6.107-4.968-11.058-11.097-11.058-6.053 0-10.975 4.83-11.095 10.832-.125 6.205 5.717 11.593 11.945 11.593h.783c5.491 0 12.85-4.282 14-9.5.212-.963-.55-1.867-1.539-1.867Zm-18.548.272c0 .817-.67 1.485-1.49 1.485s-1.49-.668-1.49-1.485v-2.402c0-.816.67-1.484 1.49-1.484s1.49.668 1.49 1.484v2.402Zm5.174 0c0 .817-.67 1.485-1.49 1.485s-1.49-.668-1.49-1.485v-2.402c0-.816.67-1.484 1.49-1.484s1.49.668 1.49 1.484v2.402Z" fill="url(#b)"/></g></svg>
                                        <span>Login with your Phantom Wallet</span>
                                </button>
                            </div>
                        </div>

                        {{-- If you are authenticated via Phantom wallet show this info --}}
                        <div id="wallet-authenticated" class="hidden bg-gray-50 dark:bg-gray-800 dark:border-gray-700 border border-gray-100 p-5 rounded-lg">
                            <div class="flex">
                                <div class="w-20 h-20 rounded-full border-4 dark:border-gray-600 border-gray-300 p-2">
                                    <img src="{{ env('SOLANA_TOKEN_IMAGE') }}" class="w-full h-full">
                                </div>
                                <div class="flex flex-col pl-3 justify-center">
                                    <h3 class="dark:text-white font-medium text-gray-800 text-2xl">{{ env('SOLANA_TOKEN_NAME') }}</h3>
                                    <p class="dark:text-gray-200 text-gray-700 flex items-center leading-none"><span id="token-amount" class="text-lg mr-1">Connect Your wallet to view your balance</span><span id="token-symbol" class="hidden text-xs">{{ env('SOLANA_TOKEN_SYMBOL') }}</span></p>
                                </div>
                            </div>
                            <input type="hidden" id="token-address" value="{{ env('SOLANA_TOKEN_ADDRESS') }}">
                            
                            <p class="mt-3 mb-4 text-lg text-gray-700 dark:text-gray-400">Total earned points: <span class="font-black">{{ auth()->user()->getPoints() }}</span></p>
                            <p class="mt-3 text-lg text-gray-700 dark:text-gray-400">Available payout: <span class="font-black">{{ auth()->user()->availablePayout() }}</span></p>

                            
                            @if(auth()->user()->availablePayout() > 0)
                                <div class="flex justify-content-center mt-5">
                                    <button wire:loading.remove wire:target="request" wire:click="request" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-green-500 border border-transparent rounded-md hover:bg-green-400 active:bg-green-600 focus:outline-none focus:border-green-500 focus:shadow-outline-gray disabled:opacity-25">Convert My Points to {{ env('SOLANA_TOKEN_NAME') }}s</button>
                                </div>
                            @endif

                        </div>


                    </div>
                </div>
                   
            </div>
        </div>
        <div>
            @livewire('airdrop-list')
        </div>
    </div>
    {{-- <script src="https://unpkg.com/@solana/web3.js@latest/lib/index.iife.min.js"></script> --}}
    <script src="/wallet/dist/main.js"></script>
</div>
