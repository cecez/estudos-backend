<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class RedisThrottle implements ShouldQueue
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
        // permite execução simultânea de no máximo 10 jobs durante 60 segundos
        Redis::throttle('throttleDoRedis')
            ->allow(10)
            ->every(60)
            ->block(10)
            ->then(function () {
                info('Executando job com throttle...');
                sleep(2);
                info('...encerrando job throttleado, liberando um lock.');
            });
    }
}
