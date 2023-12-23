<?php

use App\Models\Productatribute;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\CategoryList;
use App\Http\Livewire\Admin\ComprobanteList;
use App\Http\Livewire\Admin\ComprobanteSave;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\LpaList;
use App\Http\Livewire\LpaListd;
use App\Http\Livewire\LpaListt;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\ProductSingle;
use App\Http\Livewire\ProductSingled;
use App\Http\Livewire\ProductSinglet;
use App\Http\Livewire\ShoppingCart;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubcategoryController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', WelcomeController::class);



//para cargar stock en locales
//usamos sync para poner stock 0
//sucerera cuando se crea el local
/* Route::get('cargar/', function () {
    $productatributes = Productatribute::all();

        foreach ($productatributes as $productatribute) {
            $productatribute->locales()->attach([
                1 => [
                    'stock' => 0,
                ],
        ]);
        }
});


Route::get('limpiar/', function () {
    session()->forget('carttx');
}); */




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});



Route::group(['middleware'=>['auth:sanctum','verified'],'prefix'=>'admin'], function(){

    //comente esto para que ingese directo a public const HOME = '/admin/tables';
   //Abre el archivo RouteServiceProvider.php en el directorio app/Providers.
    /* Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');*/



    Route::get('/categories', CategoryList::class)->name('category.list');

    /* Route::get('/brands', function () {
        return view('admin.brands');
    })->name('admin.brands'); */

    /* de esta forma no es necesario poner el slot y los divs */

    Route::get('/comprobantes', ComprobanteList::class)->name('comprobante.list');
    Route::get('save-comprobantes', ComprobanteSave::class)->name('comprobante.create');
   // Route::get('/sales', SaleCreate::class)->name('sale.create');

});



