<div>
    <div class="pb-12">
        <div class="max-w-4xl mr-auto sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">

                    <div class="mt-5 md:mt-0 md:col-span-3">

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <h1 class="text-6xl font-black">Solana Blockchain</h1>
                                <p class="mt-3 mb-4 text-lg text-gray-700">Connect your Phantom wallet and request a payout.</p>
                                <p class="mt-3 mb-4 text-lg text-gray-700">Total earned points: <span class="font-black">{{ auth()->user()->getPoints() }}</span></p>
                                <p class="mt-3 mb-4 text-lg text-gray-700">Available payout: <span class="font-black">{{ auth()->user()->availablePayout() }}</span></p>
                                <p class="mt-3 mb-4 text-lg text-gray-700">Total earnings: <span class="font-black">{{ auth()->user()->airdrop }}</span></p>
                                <div>
                                    @if (isset($solWallet))
                                        <div class="d-flex justify-content-center mt-5">
                                            Your wallet: {{ $solWallet }}
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    @if(isset($solBalance))
                                        <div class="d-flex justify-content-center mt-5">
                                            <b>Balance:</b> {{ $solBalance }} SOL
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">

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
                                        <button id="login-button" onclick="phantomLogin()" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Login with Phantom Wallet</button>
                                    </div>
                                @endif
                            </div>
                        </div>
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
