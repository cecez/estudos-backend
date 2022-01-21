<?php

use App\Http\Controllers\CardsController;
use Cecez\GenderizeWrapper\Api;
use Cecez\GenderizeWrapper\Gender;
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
    return view('welcome');
});

Route::get('cards', [CardsController::class, 'index']);

Route::get('/nomes', function () {
    echo "Vamos ver os nomes e possíveis gêneros de alguns nomes:<br>";

    $nomes = ['Ana', 'Cezar', 'João', 'Angela', 'Miguel', 'Renata', 'Milton'];

    foreach ($nomes as $nome) {

        $resultado = match (Api::getGender($nome)) {
            Gender::UNKNOWN => 'desconhecido',
            Gender::FEMININE => 'feminino',
            Gender::MASCULINE => 'masculino'
        };

        echo "<p><b>$nome:</b>" . $resultado . '</p>';
    }

});
