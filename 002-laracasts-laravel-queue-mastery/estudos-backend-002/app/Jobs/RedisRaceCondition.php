<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class RedisRaceCondition implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // similar ao lock com Cache (Jobs/RaceCondition), porém com Redis
        Redis::funnel('funilDoRedits')
            ->limit(5)  // número máximo de execuções simultâneas
            ->block(10)
            ->then(function () {
                info('Executando job que tem lock redis...');
                sleep(2);
                info('...encerrando job, liberando lock redis.');
            });
    }
}
