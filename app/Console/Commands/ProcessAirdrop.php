<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessAirdrop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solana:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process all pending airdrop requests';

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

        $airdrops = \App\Models\Airdrop::where('status', 'processing')->get();

        foreach($airdrops as $airdrop) {

            $file = $this->fetchTransactionInfo($airdrop->id);
            if($file) {
                if(strpos($file, 'Signature:') !== false) {
                    $signature = substr($file, strpos($file, 'Signature:') + 10);
                    $airdrop->transaction = $signature;
                    $airdrop->status = 'completed';
                    $airdrop->save();
                } else {
                    $airdrop->status = 'failed';
                    $airdrop->save();
                }

            }

        }

    }

    public function fetchTransactionInfo($id){

        $path_to_file = storage_path('solana/airdrop-' . $id . '.log');
        if(\File::exists( $path_to_file ) ){
            $file = \File::get( $path_to_file );
            return $file;
        }
        return false;
            
    }
}
