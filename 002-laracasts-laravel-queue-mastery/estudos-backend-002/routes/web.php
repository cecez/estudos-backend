<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // executando job na hora (sem enfileirar)
    //    (new \App\Jobs\SendWelcomeEmail())->handle();

    // enfileirando job
    \App\Jobs\SendWelcomeEmail::dispatch();

    // postergando (delaying) execução do job em 5 segundos
//    \App\Jobs\SendWelcomeEmail::dispatch()->delay(5);

    return view('welcome');
});

Route::get('/100-jobs', function () {
    foreach (range(1, 100) as $i) {
        \App\Jobs\Job2::dispatch();
    }

    \App\Jobs\ProcessaPagamento::dispatch()->onQueue('pagamentos');

    return '100 jobs despachados 1 um job de pagamento';
});

Route::get('/chain-jobs', function () {
   $chain = [
       new \App\Jobs\Job2(),
       new \App\Jobs\ProcessaPagamento(),
       new \App\Jobs\SendWelcomeEmail()
   ];

   // manda executar na fila uma cadeia de jobs ordenada, na qual
   // os jobs são executados em ordem e somente quando job anterior é executado com sucesso.
   // Se algum falhar, toda a cadeia é removida da fila.
   \Illuminate\Support\Facades\Bus::chain($chain)->dispatch();
});

Route::get('/batch-jobs', function () {
    $batch = [
        new \App\Jobs\Job2(1),
        new \App\Jobs\Job2(2),
        new \App\Jobs\Job2(3),
    ];

    // os jobs do batch podem ser executados em paralelo, requisitos:
    // - os jobs precisam implementar a trait Batchable
    // - tabela para batches (gerar migration com: php artisan queue:batches-table)
    //
    // Há alguns detalhes se algum job do batch falhar, podem falhar todos os demais
    // Ler na documentação, pois também há opção allowFailures() para permitir falhas.
    \Illuminate\Support\Facades\Bus::batch($batch)
        ->allowFailures()
        ->catch(function ($batch, $exception) {     // executado quando algum job falha

        })
        ->then(function ($batch) {                  // quando todos jobs do batch foram executados com sucesso

        })
        ->finally(function ($batch) {               // quando execução do batch terminar (mesmo se falhar algum)

        })
        ->onQueue('fila_batches')
        ->onConnection('database')
        ->dispatch();
});

Route::get('/batch-of-chains-jobs', function () {
    $chain1 = [
        new \App\Jobs\Job2(1),
        new \App\Jobs\ProcessaPagamento(1)
    ];

    $chain2 = [
        new \App\Jobs\Job2(1),
        new \App\Jobs\ProcessaPagamento(1)
    ];

    // se dentro do batch houver outro array, este é considerado uma chain
    $batch = [$chain1, $chain2];

    \Illuminate\Support\Facades\Bus::batch($batch)->dispatch();
});

Route::get('/chain-with-closure', function () {
    // chain na qual o segundo "job" chama um batch de jobs
    \Illuminate\Support\Facades\Bus::chain([
        new \App\Jobs\Job2(),
        fn() => \Illuminate\Support\Facades\Bus::batch([...])->dispatch()
   ]);
});
