<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;

class JobComMiddleware implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 10;
    public $backoff = 3;

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
        info('Executando job com middleware...');
        sleep(2);
        info('...encerrando job com middleware.');
    }

    public function middleware()
    {
        return [
            // configura para que não haja execução simultânea do job
            new WithoutOverlapping('jobComMiddleware', 1),

            // caso o job esteja falhando [maxAttempts] tentativas, este middleware adia execução dos jobs,
            // recolocando na fila imediatemente os jobs
            new ThrottlesExceptions(10)
        ];
    }
}
