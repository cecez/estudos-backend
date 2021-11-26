<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds to wait before retrying the job.
     *
     */
    public int $backoff = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * Timeout para execução do job.
     * Se worker levar mais tempo, job é morto (killed)
     *
     */
    public int $timeout = 1;

    /**
     * The number of times the job may be attempted.
     *
     * Valor padrão é 1.
     */
    public int $tries = -1;

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
        info('Iniciando execução do job...');

        // simulando falha
        throw new \Exception('Teste para falhar job.');

        sleep(3);

        info('... finalizando execução do job.');
    }

    /**
     * Determine the time at which the job should timeout.
     *
     * Janela de tempo para retentativas de executar o job.
     * Se usado, colocar -1 na propriedade $tries.
     *
     * @return \DateTime
     */
    public function retryUntil(): \DateTime
    {
        return now()->addMinutes(1);
    }
}
