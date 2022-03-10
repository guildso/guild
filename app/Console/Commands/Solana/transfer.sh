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
    solana config set --url https://solana-api.projectserum.com
    spl-token transfer --allow-unfunded-recipient --fund-recipient ${token_address} ${amount} ${recipient} >> ${transfer_log} 2>&1
}

##
# Transfer ID
##
function transfer_id() {
    count=0
    while true; do
        transaction=$(cat ${transfer_log} | grep "Signature" | tail -n 1 | awk '{print $2}')
        sleep 2
        if [[ ${transaction} ]]; then
            break
        fi
        # Wiat 10 minutes for the transfer to complete, else mark as failed
        if [[ ${count} -gt 300 ]]; then
            mysql -u ${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} -e "UPDATE airdrops SET status='failed' WHERE id=${id}"
            exit 1
        fi
    done

    mysql -u ${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} -e "UPDATE airdrops SET transaction='${transaction}', status='completed' WHERE id=${id}"
}

##
# Main function
##
function main() {
    transfer
    # If the transfer was successful, then record the transfer ID
    if [ $? -eq 0 ]; then
        transfer_id
    fi
}
main