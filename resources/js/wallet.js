import * as splToken from '@solana/spl-token';
import * as solanaWeb3 from '@solana/web3.js';

// import { WalletAdapterNetwork } from '@solana/wallet-adapter-base';



// const SPL_ASSOCIATED_TOKEN_ACCOUNT_PROGRAM_ID = new solanaWeb3.PublicKey(
//   'ATokenGPvbdGVxr1b2hvZbsiqW5xWH25efTNsLJA8knL',
// );

window.phantomLogin = async function() {
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

    // const tokenAccounts = await connection.getTokenAccountsByOwner(provider.publicKey,
    //     {
    //         programId: TOKEN_PROGRAM_ID,
    //     }
    // );

//   console.log("Token                                         Balance");
//   console.log("------------------------------------------------------------");
//   tokenAccounts.value.forEach((e) => {
//     const accountInfo = AccountLayout.decode(e.account.data);
//     console.log(`${new PublicKey(accountInfo.mint)}   ${accountInfo.amount}`);
//   })


    // connection.getAccountInfoAndContext(provider.publicKey)
    //     .then(function (value) {
    //         console.log('cool: ');
    //         console.log(value);
            
    // });
    // connection.getTokenAccountBalance( new solanaWeb3.PublicKey('metaqbxxUerdq28cj1RbAWkYQm3ybzjb6a8bt518x1s') )
    //     .then(function (value) {
    //         console.log(value);
    // });
}
try {
    window.onload = () => {
        const isPhantomInstalled = window.solana && window.solana.isPhantom;
        if (isPhantomInstalled) {
            window.solana.connect({onlyIfTrusted: true})
                .then(({publicKey}) => {
                    connectAccountAnimation(publicKey.toString());
                    console.log('the public key: ');
                    console.log(publicKey.toString());
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