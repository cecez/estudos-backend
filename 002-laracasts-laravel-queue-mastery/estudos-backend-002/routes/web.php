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
