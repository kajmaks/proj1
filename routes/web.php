<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/city', function () {
    return view('city');
});

//Route::redirect('/','city');

route::get('/city1', function(){
    return view('city', ['name' => 'Maks', 'city' => 'poznan']);
});

route::get('/city2', function(){
    return 'Witaj w mieście';
});

route::get('/pages/{x}', function($x){
    return $x;  
});

route::get('/pages/{x}', function($x){
      $info = [
        'home' => 'Witam',
        'about' => 'kelvin was here',
        'contact' => 'kelvin1989@gmail.com'
      ];
      return $info[$x];
});

route::get('/adress/{city?}/{citizen?}/{zipcode?}', function(string $city = '-', string $citizen = '-', int $zipcode = null){
    if(is_null($zipcode)){
        $zipcode = 'brak danych';
    }
    else{
        $zipcode = substr($zipcode, 0, 2). '-'. substr($zipcode, 2, 3);
    }
    echo <<< ADRESS
        <hr>
            Miasto: $city <br>
            Obywatel: $citizen <br>
            Kod Pocztowy: $zipcode
        </hr>   
    ADRESS;
}) -> name(name : 'x');

Route::redirect('/xyz', 'adress');
Route::redirect('/xyz2', 'adress/Poznan/Janusz/62040');

Route::get('/status', function(){
    $response = Response::json([
        'error' => false,
        'code' => 300,
        'messege' => 'Image was deleted'], 500);
    return $response->status();
});

















