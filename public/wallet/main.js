window.Buffer = require('buffer/').Buffer;
import * as splToken from '@solana/spl-token';
import * as solanaWeb3 from '@solana/web3.js';
window.myTokenAddress = document.getElementById('token-address').value;

window.phantomLogin = async function() {
    const isPhantomInstalled = window.solana && window.solana.isPhantom;
    if (!isPhantomInstalled) {
        alert("Phantom browser extension is not detected!");
    } else {
        try {
            const resp = await window.solana.connect();
            document.getElementById('wallet-login').classList.add('hidden');
            connectAccountAnimation(resp.publicKey.toString());
            Livewire.emit('getSolWallet', resp.publicKey.toString());
        } catch (err) {
            console.log("User rejected request");
            console.log(err);
        }
    }
}

async function connectAccountAnimation(publicKey) {
    let connection = new solanaWeb3.Connection(solanaWeb3.clusterApiUrl('mainnet-beta'), 'confirmed');
    
    showBalance(connection);
    showTokenBalance(connection);

    setTimeout(function(){
        document.getElementById('wallet-loading-container').classList.add('hidden');
        document.getElementById('wallet-authenticated').classList.remove('hidden');
    }, 1000);
}


async function showBalance(connection){
    let provider = window.solana;

    connection.getBalance(provider.publicKey)
        .then(function (value) {
            Livewire.emit('getSolBalance', value);
    });
}

async function showTokenBalance(connection){

    let provider = window.solana;

    const tokenAccounts = await connection.getTokenAccountsByOwner(provider.publicKey,
        {
            programId: splToken.TOKEN_PROGRAM_ID,
        }
    );

  tokenAccounts.value.forEach((e) => {
        let account_address = e.pubkey.toBase58();


        let accountInfo = splToken.AccountLayout.decode(e.account.data);

        let tokenAddress = `${new solanaWeb3.PublicKey(accountInfo.mint)}`;
        let tokenAmount =  `${accountInfo.amount}`;
        let tokenDecimals = .000000001;

        if(myTokenAddress == tokenAddress){
            console.log(tokenAmount);
            console.log(tokenDecimals);

            document.getElementById('token-amount').innerHTML = (tokenAmount*tokenDecimals).toFixed(9);
            document.getElementById('token-symbol').classList.remove('hidden');
        }

  })
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
                    document.getElementById('wallet-loading').classList.add('hidden');
                    document.getElementById('wallet-login').classList.remove('hidden');
                })
        }
    }
} catch (err) {
    console.log(err);
}