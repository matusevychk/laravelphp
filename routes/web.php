<?php

use Illuminate\Support\Facades\Route;

use App\Models\Pizza;


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

Route::get('/pizzas/', function () {

    $pizzas = Pizza::latest()->get();

    // return view("pizzas", [
    //     'pizzas' => $pizzas,
    //     'name' => request('name'),
    //     'age' => request('age')
    // ]);
    
    return view('pizzas.index', [
        'pizzas' => $pizzas
    ]);

})->middleware("auth");

Route::get('/pizzas/create', function() {
    return view('pizzas.create');
});

Route::post('/pizzas', function() {

    $pizza = new Pizza();

    $pizza->name = request('name');
    $pizza->type = request('type');
    $pizza->base = request('base');
    $pizza->price = request('price');
    $pizza->toppings = request('toppings');
    
    $pizza->save();

     return redirect('/')->with('mssg', 'Thank you for your order');
});

Route::get('pizzas/{id}', function ($id) {
    $pizza = Pizza::findOrFail($id);

    return view('pizzas.show', ['pizza' => $pizza]); 

});

Route::delete('/pizzas/{id}', function($id) {
    $pizza = Pizza::findOrFail($id);
    $pizza->delete();

    return redirect('/pizzas');
});
Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home');
