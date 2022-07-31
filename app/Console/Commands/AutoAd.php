<?php

namespace App\Console\Commands;

use App\Mail\SendEmailTest;
use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoAd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:ad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $newDateTime = Carbon::now()->tomorrow()->format('Y-m-d');
        $ads=Ad::whereIn('start_date',[$newDateTime])->get();
            if($ads->count() > 0){
                foreach ($ads as $ad) {
                    Mail::to($ad->email)->send(new SendEmailTest('Remember your ad
                    '.$ad->title));
                }
            }
        return 0;
    }
}
