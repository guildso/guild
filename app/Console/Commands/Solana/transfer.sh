#!/bin/bash

##
# Load the Solana environment
##
. "$HOME/.cargo/env"

##
# Prepare the arguments for the transfer
##
token_address=$1
recipient=$2
amount=$3
id=$4
storage=$5
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
    spl-token transfer --allow-unfunded-recipient --fund-recipient ${token_address} ${amount} ${recipient} >> ${transfer_log} 2>&1
}

##
# Transfer ID
##
function transfer_id() {
    while true; do
        transaction=$(cat ${transfer_log} | grep "Signature" | tail -n 1 | awk '{print $2}')
        sleep 2
        if [[ ${transaction} ]]; then
            break
        fi
    done
    mysql -u ${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} -e "UPDATE airdrops SET transaction='${transaction}' WHERE id=${id}"
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