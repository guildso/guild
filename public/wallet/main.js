window.Buffer = require('buffer/').Buffer;
import * as splToken from '@solana/spl-token';
import * as solanaWeb3 from '@solana/web3.js';
window.myTokenAddress = document.getElementById('token-address').value;





// console.log(`Associated Token Address for token ${TOKEN_ADDRESS} => ${(await findAssociatedTokenAddress(YOUR_DEFAULT_SOL_ADDRESS,TOKEN_ADDRESS)).toBase58()}`)



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

console.log('rad: ');
console.log(splToken.TOKEN_PROGRAM_ID);
    const tokenAccounts = await connection.getTokenAccountsByOwner(provider.publicKey,
        {
            programId: splToken.TOKEN_PROGRAM_ID,
        }
    );

  console.log("Token                                         Balance");
  console.log("------------------------------------------------------------");
  tokenAccounts.value.forEach((e) => {
      console.log(e.account);
    console.log(e);
      let account_address = e.pubkey.toBase58();



    //   let accInfo = connection.getAccountInfo(account_address)
    //     .then(function (value) {
    //         console.log(value);
    //     });

    //console.log(splToken.AccountLayout.decode(e.account.data));

    let accountInfo = splToken.AccountLayout.decode(e.account.data);

    let tokenAddress = `${new solanaWeb3.PublicKey(accountInfo.mint)}`;
    let tokenAmount =  `${accountInfo.amount}`;



console.log('mm: ');
    console.log(tokenAddress);

    //console.log(`${new solanaWeb3.PublicKey(accountInfo.mint)}   ${accountInfo.amount}`);

    //if()
    
// splToken.getAccount(connection, e.pubkey, 1, splToken.TOKEN_PROGRAM_ID)
//     .then(function (value) {
//             console.log(value);
//     });

     // console.log(splToken.AccountLayout.getAccount(e.account.data))

      //console.log(new TextDecoder("utf-8").decode(e.account.data));
    //   console.log(splToken.AccountLayout.unpackAccount(e.account.data));
    //const accountInfo = splToken.AccountLayout.decode(e.account.data);
    // console.log(`${new solanaWeb3.PublicKey(accountInfo.mint)}   ${accountInfo.amount}`);
  })


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