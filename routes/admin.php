<?php
use App\Models\Expediente;
use App\Models\Tipodedocumento;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\BrandList;
use App\Http\Livewire\Admin\ModeloList;
use App\Http\Livewire\Admin\ProductList;
use App\Http\Livewire\Admin\CategoryList;
use App\Http\Livewire\Admin\ShipmentEdit;
use App\Http\Livewire\Admin\Anio\AnioList;
use App\Http\Livewire\Admin\CategoryListd;
use App\Http\Livewire\Admin\InventoryList;
use App\Http\Livewire\Admin\ReceptionEdit;
use App\Http\Livewire\Admin\InventoryList2;
use App\Http\Livewire\Admin\PermissionList;
use App\Http\Livewire\Admin\Color\ColorList;
use App\Http\Livewire\Admin\Marca\MarcaList;
use App\Http\Livewire\Admin\InventoryListdos;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Livewire\Admin\Awkizona\ZonaList;
use App\Http\Controllers\admin\TableController;
use App\Http\Livewire\Admin\Modello\ModelloList;
use App\Http\Livewire\Admin\InventorygeneralList;
use App\Http\Livewire\Admin\ProductcompuestoEdit;
use App\Http\Livewire\Admin\ProductcompuestoList;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ShipmentController;
use App\Http\Controllers\admin\ShoppingController;
use App\Http\Livewire\Admin\Awkitienda\TiendaList;
use App\Http\Livewire\Admin\Consulta\ConsultaList;
use App\Http\Controllers\admin\ReceptionController;
use App\Http\Livewire\Admin\InventorytemporaryList;
use App\Http\Livewire\Admin\ProductcompuestoCreate;
use App\Http\Livewire\Admin\ProductfamilieCreateaa;
use App\Http\Controllers\admin\ExpedienteController;
use App\Http\Controllers\admin\UsersRolesController;
use App\Http\Livewire\Admin\Awkicliente\ClienteList;
use App\Http\Livewire\Admin\Categoria\CategoriaList;
use App\Http\Livewire\Admin\ProductcompuestoCreatea;
use App\Http\Livewire\Admin\Awkicliente\ClienteList2;
use App\Http\Livewire\Admin\Expediente\ExpedienteList;
use App\Http\Controllers\admin\ConfigurationController;
use App\Http\Controllers\admin\ProductfamilieController;
use App\Http\Livewire\Admin\Statusfinal\StatusfinalList;
use App\Http\Controllers\admin\ProductatributeController;
use App\Http\Controllers\admin\UsersPermissionsController;
use App\Http\Livewire\Admin\LocalproductatributestockList;
use App\Http\Livewire\Admin\Statussunarp\StatussunarpList;
use App\Http\Livewire\Admin\Awkirepresentada\RepresentadaList;
use App\Http\Livewire\Admin\Tipodedocumento\TipodedocumentoList;
use App\Http\Livewire\Admin\LocalproductatributestocktotalesList;
use App\Http\Livewire\Admin\Oficinaregistral\OficinaregistralList;
use App\Http\Livewire\Admin\Expediente\ExpedienteListuser;//lista expediente del cliente

//Route::get('/', [HomeController::class, 'home'])->name('admin.home');
Route::get('/tables', [TableController::class, 'showtables'])->name('admin.showtables');

Route::get('/representadas', RepresentadaList::class)->name('representada.list');
Route::get('/zonas', ZonaList::class)->name('zona.list');
Route::get('/tiendas', TiendaList::class)->name('tienda.list');
Route::get('/clientes', ClienteList::class)->name('cliente.list');
Route::get('/clientes2', ClienteList2::class)->name('cliente.list2');

//Route::resource('expediente', ExpedienteController::class)->except(['create','index'])->names('admin.expediente');
Route::get('expediente/{clientee}', [ExpedienteController::class, 'create'])->name('admin.expediente.create');
Route::post('expediente/', [ExpedienteController::class, 'store'])->name('admin.expediente.store');
Route::put('expediente/{expedientee}', [ExpedienteController::class, 'update'])->name('admin.expediente.update');
Route::get('expediente/{expedientee}/edit', [ExpedienteController::class, 'edit'])->name('admin.expediente.edit');
Route::get('/expedientes', ExpedienteList::class)->name('expediente.list');


Route::get('/expedientes/{cliente}', ExpedienteListuser::class)->name('expediente.list.user');//lista de expediente del cliente

Route::get('/marcas', MarcaList::class)->name('marca.list');
Route::get('/modellos', ModelloList::class)->name('modello.list');
Route::get('/oficinaregistrals', OficinaregistralList::class)->name('oficinaregistral.list');
Route::get('/statussunarps', StatussunarpList::class)->name('statussunarp.list');
Route::get('/anios', AnioList::class)->name('anio.list');
Route::get('/categorias', CategoriaList::class)->name('categoria.list');
Route::get('/colores', ColorList::class)->name('color.list');

Route::get('/consultas', ConsultaList::class)->name('consulta.list');

Route::get('/statusfinal', StatusfinalList::class)->name('statusfinal.list');
Route::get('/tipodedocumentos', TipodedocumentoList::class)->name('tipodedocumento.list');




Route::get('/categories', CategoryList::class)->name('category.list');
Route::get('/modelos', ModeloList::class)->name('modelo.list');
//Route::get('/marcas', BrandList::class)->name('brand.list');
//Route::get('/empezarinventarioinicial', InventoryList::class)->name('inventory.list');
Route::get('/inventarioinicial', InventoryList::class)->name('inventory.list');//lista los inventarios
/* no usaremos porque lo controlaresmos con primarykey de laravel */
Route::get('/inventariogeneral', InventoryListdos::class)->name('inventory.listdos');//lista los inventarios dos
Route::get('/inventariog', InventorygeneralList::class)->name('inventorygeneral.lis');//lista los inventarios dos
Route::get('/listadeinventarios', InventoryList2::class)->name('inventory.list2');//lista los inventarios dos
Route::get('/inventariotemporallist/{inventory}', InventorytemporaryList::class)->name('inventorytemporary.list');//lista los inventarios
Route::get('/stockdeproductos/{local}', LocalproductatributestockList::class)->name('localproductatributestock.list');//lista de stock local product atribute stock
Route::get('/stockdeproductostotales/{productatribute_id}', LocalproductatributestocktotalesList::class)->name('localproductatributestocktotales.list');//lista de stock local product atribute stock
//compra de mercaderias shopping
Route::resource('shopping', ShoppingController::class)->names('admin.shopping');
Route::get('sale', [SaleController::class, 'index'])->name('admin.sale.index');
Route::get('sale/create', [SaleController::class, 'create'])->name('admin.sale.create');


//envio de mercaderias entre locales
//php artisan make:controller admin/ShipmentController -r -m Shipment
Route::resource('shipment', ShipmentController::class)->names('admin.shipment');
Route::get('/shipments/{shipment}', ShipmentEdit::class)->name('shipment.edit');
//php artisan make:controller admin/ReceptionController
//Route::resource('reception', ReceptionController::class)->names('admin.reception');
Route::get('reception', [ReceptionController::class, 'index'])->name('admin.reception.index');//lista recepciones para conformar
Route::get('/receptions/{reception}', ReceptionEdit::class)->name('reception.edit');



//Route::get('categories', [CategoryController::class, 'index']);
Route::get('categoriess', CategoryListd::class)->name('category.listd');
Route::get('products', ProductList::class)->name('product.list');
Route::get('productcompuesto/{product}', ProductcompuestoCreate::class)->name('productcompuesto.create');//creamos el producto productatribute
Route::get('productcompuestoedit/{product}', ProductcompuestoEdit::class)->name('productcompuesto.edit');



Route::resource('productatribute', ProductatributeController::class)->names('admin.productatribute');
Route::get('productatributepricesale/{product}', [ProductatributeController::class, 'pricesale'])->name('admin.productatribute.pricesale');
Route::get('productatributepricepurchase/{product}', [ProductatributeController::class, 'pricepurchase'])->name('admin.productatribute.pricepurchase');//lista productos generados para modificar precio de compra
Route::get('productatributepricewholesale/{product}', [ProductatributeController::class, 'pricewholesale'])->name('admin.productatribute.pricewholesale');//lista productos generados para modificar precio de venta al por mayor
Route::get('productatributecodigo/{product}', [ProductatributeController::class, 'codigo'])->name('admin.productatribute.codigo');//lista productos generados para modificar codigo

Route::get('productatributedelete/{product}', [ProductatributeController::class, 'delete'])->name('admin.productatribute.delete');//activa para eliminar productos


Route::get('productatributeaddimage/{productatribute}', [ProductatributeController::class, 'addimage'])->name('admin.productatribute.addimage');//vista para agregar imagenes del productoatribute
Route::get('/productatributeaddphoto', [ProductatributeController::class, 'addphoto'])->name('admin.productatribute.addphoto');//vista para agregar imagenes del productoatribute
Route::post('/productatributestorephoto', [ProductatributeController::class, 'storephoto'])->name('admin.productatribute.storephoto');
Route::post('productatributestoreimage/{productatribute}', [ProductatributeController::class, 'storeimage'])->name('admin.productatribute.storeimage');
Route::delete('productatributedestroyimage/{photo}', [ProductatributeController::class, 'destroyimage'])->name('admin.productatribute.destroyimage');


Route::post('productatributepricepurchase', [ProductatributeController::class, 'updatepricepurchase'])->name('admin.productatribute.updatepricepurchase');//actualiza precios
Route::post('productatributepricesale', [ProductatributeController::class, 'updatepricesale'])->name('admin.productatribute.updatepricesale');//actualiza precios
Route::post('productatributepricewholesale', [ProductatributeController::class, 'updatepricewholesale'])->name('admin.productatribute.updatepricewholesale');//actualiza precios

Route::post('productatributesupdatecodigo', [ProductatributeController::class, 'updatecodigo'])->name('admin.productatribute.updatecodigo');//actualiza codigo


//Route::get('productfamily', ProductfamilieCreateaa::class)->name('productfamilie.createaa');
Route::get('productfamily/{category}', ProductfamilieCreateaa::class)->name('productfamilie.createaa');

Route::get('productcompuestolist/{product}', ProductcompuestoList::class)->name('productcompuesto.list');


Route::get('/xxx', [ProductfamilieController::class, 'create'])->name('admin.create');

Route::get('/dropzone', [ProductatributeController::class, 'dropzone'])->name('admin.dropzone');
Route::post('/dropzone', [ProductatributeController::class, 'dropzoneok'])->name('admin.dropzoneok');

//Route::resource('usuarios', UserController::class)->names('admin.usuarios');
Route::resource('user', UserController::class)->names('admin.user');



Route::put('users/{user}/roles', [UsersRolesController::class, 'update'])->name('admin.user.roles.update')->middleware('role:Admin');
Route::put('users/{user}/permissions', [UsersPermissionsController::class, 'update'])->name('admin.users.permissions.update')->middleware('role:Admin');

Route::resource('role', RoleController::class)->names('admin.role');
Route::get('/permission', PermissionList::class)->name('permission.list');


//Route::resource('configuration', ConfigurationController::class)->only(['edit','update'])->names('admin.configuration')->middleware('permission:update Configuration');
Route::resource('configuration', ConfigurationController::class)->only(['edit','update'])->names('admin.configuration');


Route::get('/logout', function () {
    auth()->logout();
    return redirect('/login');
});

