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
        Process::fromShellCommandline('bash ' . base_path().'/app/Console/Commands/Solana/transfer.sh ' . $this->argument('token') . ' ' . $this->argument('recipient') . ' ' . $this->argument('amount') . ' ' . $this->argument('id') . ' ' . storage_path() )->start();
        return $this->info('Transfer approved');
    }
}
