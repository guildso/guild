<div>
    <div class="pb-12">
        <div class="max-w-4xl">
            <div class="mt-10 sm:mt-0">

                <div class="overflow-hidden sm:rounded-md">
                    <div class="px-1 py-5">
                        <h1 class="text-6xl font-black text-gray-700 dark:text-white">Payouts</h1>
                        <p class="mt-3 mb-4 text-lg text-gray-700 dark:text-gray-400">Connect your Phantom wallet and request a payout via your company solana token.</p>
                        <p class="mt-3 mb-4 text-lg text-gray-700 dark:text-gray-400">Total earned points: <span class="font-black">{{ auth()->user()->getPoints() }}</span></p>
                        <p class="mt-3 mb-4 text-lg text-gray-700 dark:text-gray-400">Available payout: <span class="font-black">{{ auth()->user()->availablePayout() }}</span></p>
                        <p class="mt-3 mb-4 text-lg text-gray-700 dark:text-gray-400">Total earnings: <span class="font-black">{{ auth()->user()->airdrop }}</span></p>
                        <div>
                            @if (isset($solWallet))
                                <div class="d-flex justify-content-center mt-5 text-gray-700 dark:text-gray-200">
                                    Your wallet: {{ $solWallet }}
                                </div>
                            @endif
                        </div>

                        <div>
                            @if(isset($solBalance))
                                <div class="d-flex justify-content-center mt-5 text-gray-700 dark:text-gray-200">
                                    <b>Balance:</b> {{ $solBalance }} SOL
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center justify-start">

                        @if (isset($solWallet))
                            <div class="d-flex justify-content-center mt-5">
                                @if (auth()->user()->airdrops()->where('status', 'requested')->exists())
                                    <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 cursor-not-allowed" disabled>Airdrop requested</button>
                                @else
                                    @if(auth()->user()->availablePayout() > 0)
                                        <button wire:loading.remove wire:target="request" wire:click="request" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Request airdrop</button>
                                    @endif
                                @endif
                            </div>
                        @else
                            <div class="d-flex justify-content-center mt-5">
                                <button 
                                    id="login-button" 
                                    onclick="phantomLogin()" 
                                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                        <svg class="w-10 h-10 -ml-1.5 mr-2.5" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="a"><stop stop-color="#534BB1" offset="0%"/><stop stop-color="#551BF9" offset="100%"/></linearGradient><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="b"><stop stop-color="#FFF" offset="0%"/><stop stop-color="#FFF" stop-opacity=".82" offset="100%"/></linearGradient></defs><g fill-rule="nonzero" fill="none"><circle fill="url(#a)" cx="17" cy="17" r="17"/><path d="M29.17 17.207h-2.997c0-6.107-4.968-11.058-11.097-11.058-6.053 0-10.975 4.83-11.095 10.832-.125 6.205 5.717 11.593 11.945 11.593h.783c5.491 0 12.85-4.282 14-9.5.212-.963-.55-1.867-1.539-1.867Zm-18.548.272c0 .817-.67 1.485-1.49 1.485s-1.49-.668-1.49-1.485v-2.402c0-.816.67-1.484 1.49-1.484s1.49.668 1.49 1.484v2.402Zm5.174 0c0 .817-.67 1.485-1.49 1.485s-1.49-.668-1.49-1.485v-2.402c0-.816.67-1.484 1.49-1.484s1.49.668 1.49 1.484v2.402Z" fill="url(#b)"/></g></svg>
                                        <span>Login with your Phantom Wallet</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                   
            </div>
        </div>
        <div>
            @livewire('airdrop-list')
        </div>
    </div>
    <script src="https://unpkg.com/@solana/web3.js@latest/lib/index.iife.min.js"></script>

    <script>
        async function phantomLogin() {
            const isPhantomInstalled = window.solana && window.solana.isPhantom;
            if (!isPhantomInstalled) {
                alert("Phantom browser extension is not detected!");
            } else {
                try {
                    const resp = await window.solana.connect();
                    connectAccountAnimation(resp.publicKey.toString());
                    Livewire.emit('getSolWallet', resp.publicKey.toString());
                } catch (err) {
                    console.log("User rejected request");
                    console.log(err);
                }
            }
        }
        async function connectAccountAnimation(publicKey) {
            showBalance();
        }
        async function showBalance(){
            let provider = window.solana;
            let connection = new solanaWeb3.Connection(solanaWeb3.clusterApiUrl('mainnet-beta'), 'confirmed');
            connection.getBalance(provider.publicKey)
                .then(function (value) {
                    Livewire.emit('getSolBalance', value);
            });
        }
        try {
            window.onload = () => {
                const isPhantomInstalled = window.solana && window.solana.isPhantom;
                if (isPhantomInstalled) {
                    window.solana.connect({onlyIfTrusted: true})
                        .then(({publicKey}) => {
                            connectAccountAnimation(publicKey.toString());
                            Livewire.emit('getSolWallet', publicKey.toString());
                        })
                        .catch(() => {
                            console.log("Not connected");
                        })
                }
            }
        } catch (err) {
            console.log(err);
        }
    </script>
</div>
