<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Solana extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solana:approve {token} {recipient} {amount} {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Approve airdrop';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $proc = Process::fromShellCommandline('bash ' . base_path().'/app/Console/Commands/Solana/transfer.sh', null, 
            [
                'SOLANA_TOKEN_ADDRESS' => $this->argument('token'),
                'SOLANA_RECIPIENT' => $this->argument('recipient'),
                'SOLANA_AMOUNT' => $this->argument('amount'),
                'SOLANA_ID' => $this->argument('id'),
                'STORAGE_PATH' => storage_path(),
            ]
        );
        $proc->run();
        return $this->info('Transfer approved');
    }
}
