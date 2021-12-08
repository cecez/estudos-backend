<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Job2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    // remove job caso model não seja encontrado
    // por padrão false, o que faz o job falhar
    public bool $deleteWhenMissingModels = true;

    /**
     * @var mixed|null
     */
    private mixed $parametro;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($parametro = null)
    {
        $this->parametro = $parametro;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Ler na documentação.
        if ($this->batch()->cancelled()) {
            return;
        }

        info('Iniciando execução do job 2...');

        sleep(1);

        info('... finalizando execução do job 2.');
    }
}
