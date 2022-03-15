#!/bin/bash

##
# Load the Solana environment
##
. "$HOME/.cargo/env"

##
# Prepare the arguments for the transfer
##
token_address=${SOLANA_TOKEN_ADDRESS}
recipient=${SOLANA_RECIPIENT}
amount=${SOLANA_AMOUNT}
id=${SOLANA_ID}
storage=${STORAGE_PATH}

transfer_log=${storage}/solana/airdrop-${id}.log

##
# Load the Laravel environment
##
env_location=$(echo ${storage} | sed 's/storage//')
export $(cat ${env_location}/.env | xargs)

##
# Transfer function
##
function transfer() {
    spl-token transfer --url https://solana-api.projectserum.com --no-wait --allow-unfunded-recipient --fund-recipient ${token_address} ${amount} ${recipient} >> ${transfer_log} 2>&1
}

##
# Set transfer to processing
##
function set_to_pending() {
    mysql -u ${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} -e "UPDATE airdrops SET transaction='${transaction}', status='processing' WHERE id=${id}"
}

##
# Transfer ID
##
function transfer_id() {

    transaction=$(cat ${transfer_log} | grep "Signature" | tail -n 1 | awk '{print $2}')
    sleep 2
    # Check if the transaction is ready
    if [[ ${transaction} ]]; then
        mysql -u ${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} -e "UPDATE airdrops SET transaction='${transaction}', status='completed' WHERE id=${id}"
    else
        set_to_pending
    fi
    
}

##
# Main function
##
function main() {
    transfer
    transfer_id
}
main
