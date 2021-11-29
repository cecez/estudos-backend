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
     * Pode ser um array para as tentativas posteriores
     * Ex: [2, 20, 200]
     * 2s para primeira, 20s para segunda, 200s para terceira em diante
     */
    public $backoff = 3;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     */
    public int $maxExceptions = 3;

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
     * Método executado quando job falha (quando vai para fila de failed_jobs).
     * @param $exception
     */
    public function failed(\Exception $exception)
    {
        info('Logando um job que falhou por: ' . $exception->getMessage());
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

        // recoloca job na fila com algum delay em segundos
        // se exceder propriedade tries, job é falhado
        // $this->release(2);
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
