require('./bootstrap');
require('alpinejs');
import hotkeys from 'hotkeys-js';
import { EmojiButton } from '@joeattardi/emoji-button';

hotkeys('ctrl+return, command+return', function() {
    window.livewire.emit('toggleShift');
});


window.notificationOpen = false;
window.notificationTimeout = null;
window.notficationRemove = null;
window.notification = {

    show: function(type, message){

        // clear the current timeouts
        clearTimeout(notificationTimeout);
        clearTimeout(notficationRemove);
        if(document.getElementById('notification')){
            document.getElementById('notification').remove();
        }

        let successSVG = `<svg class="w-auto h-8 relative" viewBox="0 0 1511 1127" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g><path d="M1260.043.995V288.929h250.728v-71.801h-179.265V.995h-71.463zM0 .995V288.929H250.728v-71.801H71.462V.995H0zm888.5.339H828.685v161.959H773.943v54.174h-37.116v-54.174H682.313V1.334h-71.462v179.7H665.026V235.095H719.43v54.174H791.23v-54.174H845.971V181.034H900.487V1.334H888.5zm323.462.34H988.49v53.722H933.974v180.039H988.49v54.176h235.459v-71.803h-218.173v-36.434h108.917V109.572h-108.917V73.476h218.173V1.674h-11.987zm-648.512 0H339.976v53.722h-54.514v180.039h54.514v54.176H575.436v-71.803H357.264v-36.434H466.18v-71.802H357.264V73.476h218.172V1.674H563.45z" fill="#1A1A1A"/><path d="M1351.051 421.02H801.831v704.715h166.401V856.578h406.975V722.706h135.564V555.457h-135.564V421.02h-24.156zM968.232 639.082v-50.813h375.291V689.33h-375.29v-50.25zm-282.6-217.217H542.54v537.467H167.25V421.865H0v570.841H135.283v133.874h438.94V992.706h135.565V421.865h-24.156z" fill="#28DFA4"/></g></g></svg>`;
        let notifySVG = `<svg class="w-6 h-6 text-blue-400 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;
        let warningSVG = `<svg class="w-6 h-6 text-yellow-400 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>`;
        let errorSVG = `<svg class="w-6 h-6 text-red-500 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`;

        let successColor = `text-green-400`;
        let notifyColor = `text-blue-400`;
        let warningColor = `text-orange-400`;
        let errorColor = `text-red-400`;

        let successTitle = `Awesome!`;
        let notifyTitle = `Notice`;
        let warningTitle = `Heyo!`;
        let errorTitle = `Something went wrong`;

        let notificationSVG = notifySVG;
        let notificationColor = notifyColor;
        let notificationTitle = notifyTitle;

        switch(type){
            case 'success':
                notificationSVG = successSVG;
                notificationColor = successColor;
                notificationTitle = successTitle;
                break;

            case 'warning':
                notificationSVG = warningSVG;
                notificationColor = warningColor;
                notificationTitle = warningTitle;
                break;

            case 'info':
                notificationSVG = notifySVG;
                notificationColor = notifyColor;
                notificationTitle = notifyTitle;
                break;

            case 'error':
                notificationSVG = errorSVG;
                notificationColor = errorColor;
                notificationTitle = errorTitle;
                break;

        }

        let notificationHTML = `<div class="w-80 h-auto rounded-t-lg border border-gray-200 border-b-0 dark:border-dark-800 shadow-2xl border bg-white dark:bg-dark-900 flex relative">
                                    <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150 absolute right-0 top-0 mt-3 mr-3 close-notification">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div class="w-16 flex items-center rounded-tl-lg relative h-16 bg-gray-50 p-2 border-r border-gray-200">
                                        <div class="w-auto rounded-full pl-1 relative">
                                            ` + notificationSVG + `
                                        </div>
                                    </div>
                                    <div class="w-full ml-5 mt-2 mb-3">
                                        <h4 class="` + notificationColor + ` font-bold">` + notificationTitle + `</h4>
                                        <p class="text-xs text-gray-600 pr-8">` + message + `</p>
                                    </div>
                                </div>`;

        let notificationElement = document.createElement('div');
        notificationElement.className = 'fixed bottom-0 z-50 mt-3 mr-3 -ml-40 transition-all duration-300 ease-out transform translate-y-2 opacity-0 left-1/2';
        notificationElement.id = 'notification';
        notificationElement.innerHTML = notificationHTML;
        document.getElementById('app').appendChild(notificationElement);

        let notificationCloseBtns = document.getElementsByClassName('close-notification');
        for(var i=0; i<notificationCloseBtns.length; i++){
            notificationCloseBtns[i].addEventListener('click', function(){

                document.getElementById('notification').classList.add('opacity-0', 'translate-y-2');
                notficationRemove = setTimeout(function(){
                    document.getElementById('notification').remove();
                    clearTimeout(notificationTimeout);
                }, 2000);
            });
        }

        setTimeout(function(){
            notificationOpen = true;
            document.getElementById('notification').classList.remove('translate-y-2', 'opacity-0');
        }, 100);
        notificationTimeout = setTimeout(function(){
            document.getElementById('notification').classList.add('opacity-0');
            notficationRemove = setTimeout(function(){
                document.getElementById('notification').remove();
            }, 2000);
        }, 4000);
    }

}

/********** LIVEWIRE EVENT LISTENERS ********/

window.addEventListener('notification', event => {
    notification.show( event.detail.type, event.detail.message );
});

window.addEventListener('show-notification', event => {
    showNotification( event.detail.amount, event.detail.message );
});


/********** END LIVEWIRE EVENT LISTENERS **********/

/********** START EMOJI PICKER FUNCTIONALITY ***********/

let currentEmojiInputLocation = 0;
let selectedInput = null;
let trigger = document.querySelectorAll('.emoji-trigger');

// trigger.addEventListener('click', function(){
//     console.log(this);
//     //picker.togglePicker(trigger);
// });

console.log(trigger.length);

// loop through each trigger
for( var i=0; i<trigger.length; i++){


    // add the click event for each trigger
    trigger[i].addEventListener('click', function(){

        let currentInput = this.parentNode.firstElementChild;
        //console.log(this);
        let picker = new EmojiButton();
        picker.on('emoji', selection => {
            // handle the selected emoji here
            currentInput.value = currentInput.value + selection.emoji;
        });

        picker.togglePicker(this);
    });
    console.log(trigger[i].parentNode.querySelector('.emoji-trigger'));
    // for each parent node .emoji-input add the keyup event
    trigger[i].parentNode.firstElementChild.addEventListener('keyup', e => {
        currentEmojiInputLocation = e.target.selectionStart;
    });

    trigger[i].parentNode.firstElementChild.addEventListener('focus', e => {
        selectedInput = this;
        setTimeout(function(){
            console.log(e.target.selectionStart);
            currentEmojiInputLocation = e.target.selectionStart;
        }, 10)
    });

    // trigger[i].parentNode.firstElementChild.addEventListener('blur', e => {

    //     currentEmojiInputLocation = 0;
    // });

}

window.addEmojiInString = function(str, index, emoji){
    return str.substring(0, index) + emoji + str.substring(index, str.length);
}
// trigger.addEventListener('click', function(){
//     picker.togglePicker(trigger);
// });



/********** END EMOJI PICKER FUNCTIONALITY ***********/
