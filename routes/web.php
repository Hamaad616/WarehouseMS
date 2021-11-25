<?php

use App\Models\categories;
use App\Models\product_item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\MainController::class, 'checklogin']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::get('warehouse/{wh_id}/{wh_name}/{wh_code}', [App\Http\Controllers\MainController::class, 'getWareHouseById'])->name('warehouse.details');
Route::get('warehouse-rack-new/{wh_id}/{wh_code}/{wh_name}', [App\Http\Controllers\MainController::class, 'viewRacksAdd'])->name('racks.add');
Route::post('add_new_rack', [\App\Http\Controllers\MainController::class, 'addNewRack'])->name('rack.create');
Route::get('add-row-view/{wh_id}/{rk_id}', [App\Http\Controllers\MainController::class, 'addRowInRackView'])->name('racks.add-row');
Route::post('insert-row', [App\Http\Controllers\MainController::class, 'add_new_rows'])->name('insert-row');
Route::get('view-rows/{wh_id}/{rk_id}', [App\Http\Controllers\MainController::class, 'warehouse_row_table'])->name('rows.index');
Route::get('add-bin/{wh_id}/{rk_id}/{rk_name}/{row_id}/{row_code}/{width}/{height}/{depth}', [App\Http\Controllers\MainController::class, 'add_bin'])->name('bin.add');
Route::get('edit-bin/{wh_id}/{rk_id}/{rk_name}/{row_code}/{row_id}/{width}/{height}/{depth}', [App\Http\Controllers\MainController::class, 'edit_bin'])->name('bin.edit');
Route::get('view-bins/{wh_id}/{rk_id}/{rk_name}/{row_code}/{row_id}/{width}/{height}/{depth}', [App\Http\Controllers\MainController::class, 'view_bins'])->name('bin.view');
Route::get('vendors', [App\Http\Controllers\MainController::class, 'getVendors'])->name('vendors');
Route::get('vendors-list', [App\Http\Controllers\MainController::class, 'getVendorsList'])->name('vendors.list');
Route::post('edit-vendors', [App\Http\Controllers\MainController::class, 'editVendors'])->name('vendors.edit');
Route::post('update-vendors', [App\Http\Controllers\MainController::class, 'updateVendors'])->name('vendors.update');
Route::post('delete-vendor', [App\Http\Controllers\MainController::class, 'deleteVendor'])->name('vendors.delete');
Route::post('delete-vendors-selected', [App\Http\Controllers\MainController::class, 'deleteVendorSelected'])->name('vendors.selected.delete');

Route::get('add-categories', function(){
    $categories = categories::where('parent_id', '=', 0);
    return view('category.add_category', ['categories' => $categories]);
});

Route::get('categories-list', [App\Http\Controllers\MainController::class, 'getCategoriesList'])->name('categories.list');
Route::post('add-categories', [App\Http\Controllers\MainController::class, 'addCategoriesForm'])->name('categories.add');
Route::post('edit-categories', [App\Http\Controllers\MainController::class, 'editCategories'])->name('categories.edit');
Route::post('update-categories', [App\Http\Controllers\MainController::class, 'editCategoriesForm'])->name('categories.update');
Route::post('delete-categories', [App\Http\Controllers\MainController::class, 'deleteCategories'])->name('categories.delete');
Route::post('delete-categories-selected', [App\Http\Controllers\MainController::class, 'deleteCategorySelected'])->name('category.selected.delete');
Route::post('add-subcategory-modal', [App\Http\Controllers\MainController::class, 'addSubCategoriesModal'])->name('categories.subcategory');
Route::post('add-subcategory', [App\Http\Controllers\MainController::class, 'addSubCategory'])->name('categories.add-subcategory');

Route::get('units', [App\Http\Controllers\MainController::class, 'units'])->name('units');
Route::get('units-list', [App\Http\Controllers\MainController::class, 'unitsList'])->name('units.list');
Route::post('units-create', [MainController::class, 'createUnits'])->name('units.add');
Route::post('delete-unit', [MainController::class, 'deleteUnit'])->name('units.delete');
Route::post('delete-selected-units', [MainController::class, 'deleteSelectedUnits'])->name('unit.selected.delete');
Route::post('unit-edit', [MainController::class, 'editUnit'])->name('unit.edit');
Route::post('unit-update', [MainController::class, 'updateUnit'])->name('unit.update');
Route::get('create-vendor', [App\Http\Controllers\MainController::class, 'createVendor'])->name('vendor.create');
Route::post('/upt_bin', [App\Http\Controllers\MainController::class,'update_bin']);
Route::any('/del_bin',[App\Http\Controllers\MainController::class, 'del_bin'])->name('del_bin');
Route::any('delete-bin/{wh_id}/{rk_id}/{rk_name}/{row_code}/{width}/{height}/{depth}', [App\Http\Controllers\MainController::class, 'delete_bin'])->name('bin.delete');
Route::post('store-bin', [App\Http\Controllers\MainController::class, 'storeBin'])->name('bin.store');
Route::get('warehouse-edit/{wh_id}', [App\Http\Controllers\MainController::class, 'editWareHouseById'])->name('warehouse.edit');
Route::post('warehouse-update', [\App\Http\Controllers\MainController::class, 'updateWarehouse'])->name('warehouse.update');
Route::any('warehouse-delete/{wh_id}', [App\Http\Controllers\MainController::class, 'deleteWareHouseById'])->name('warehouse.delete');
Route::get('warehouse-rack-edit/{rk_id}/{wh_id}/{wh_code}/{wh_name}', [MainController::class, 'editWarehouseRackById'])->name('warehouse.rack.edit');
Route::post('rack-update', [App\Http\Controllers\MainController::class, 'rackEdit'])->name('rack.update');
Route::any('warehouse-rack-delete/{rk_id}', [MainController::class, 'deleteWarehouseRackById'])->name('warehouse.rack.delete');
Route::get('check-rack-barcode/{wh_id}/{rk_id}', [MainController::class, 'getRackBarcodes']);

Auth::routes();
Route::get('client-profile/{client_id}', [MainController::class, 'clientProfile'])->name('client.profile');
Route::get('client-audit-history/{client_id}', [MainController::class, 'auditClient'])->name('client.audit');
Route::post('client-update-creds', [MainController::class, 'updateClientCreds'])->name('client.edit-creds');
Route::post('client-creds-update', [MainController::class, 'updateClientsSubmit'])->name('client.update-creds');
Route::get('clients-home/warehouse/{wh_id}', [MainController::class, 'getClientsHome']);
Route::get('create-new-client', [MainController::class, 'viewClientCreate'])->name('client.view');
Route::post('create-new-client', [MainController::class, 'createClient'])->name('client.create');
Route::get('clients-edit/{sch_id}/{sch_name}', [MainController::class, 'editClientById'])->name('client.edit');
Route::post('add-existing-contact', [MainController::class, 'addExistingContact'])->name('add.contact_new');
Route::get('add-new-contact-submit', [MainController::class, 'addExistingContactSubmit'])->name('contact.add-new-submit');
Route::get('client-view-details/{sch_id}/{sch_name}', [\App\Http\Controllers\MainController::class, 'clientDetails'])->name('client.view-more');
Route::post('client-update', [\App\Http\Controllers\MainController::class, 'updateClient'])->name('client.update');
Route::any('delete-client/{sch_id}', [MainController::class, 'deleteClientById'])->name('client.delete');
Route::get('client-details/{sch_id}', [MainController::class, 'getClientItems'])->name('client-details');
Route::get('client-edit/{category_id}', [\App\Http\Controllers\MainController::class, 'editCategoryView'])->name('category.edit');
Route::any('client-delete/{category_id}', [\App\Http\Controllers\MainController::class, 'deleteCategory'])->name('category.delete');
Route::get('category-create-view', [\App\Http\Controllers\MainController::class, 'categoryView']);
Route::get('categories-index', [App\Http\Controllers\MainController::class, 'getCategoriesIndex'])->name('categories');
Route::post('category-update', [App\Http\Controllers\MainController::class, 'updateCategory'])->name('category.update');
Route::get('item-add-view/{client_id}', [\App\Http\Controllers\MainController::class, 'clientItemAddView'])->name('client.item-add');
Route::get('subcat', [MainController::class, 'selectSubCat'])->name('subcat');
Route::post('client-item-create', [App\Http\Controllers\MainController::class, 'addClientItem'])->name('item.create');
Route::get('item-edit-view/{pitem_id}', [App\Http\Controllers\MainController::class, 'getItemEditView'])->name('item.edit-view');
Route::post('upt_product_item_cnfrm', [\App\Http\Controllers\MainController::class, 'product_item_update_cnfrm']);
Route::get('item-edit-delete/{pitem_id}', [App\Http\Controllers\MainController::class, 'deleteItem'])->name('item.delete');
Route::post('category-create', [App\Http\Controllers\MainController::class, 'createCategory'])->name('category.create');
Route::get('product-item-table/{item_id}/{sch_id}/{item_name}', [App\Http\Controllers\MainController::class, 'getProductItemTable']);

Auth::routes();
Route::get('grn-details/{sch_id}', [App\Http\Controllers\MainController::class, 'getGrnDetailsByClient'])->name('grn.view');
Route::get('client-add-grn/{sch_id}', [App\Http\Controllers\MainController::class, 'addGrnView'])->name('grn.create-view');
Route::any('/check_code', [MainController::class, 'check_code']);
Route::post('client-create-grn', [App\Http\Controllers\MainController::class, 'createGrn'])->name('grn.create');
Route::get('created-grn_details/{sch_id}/{grn_id}', [App\Http\Controllers\MainController::class, 'grn_details'])->name('grn.details-created');
Route::any('grn-delete/{grn_id}', [App\Http\Controllers\MainController::class, 'deleteGrn'])->name('grn.delete');
Route::any('grn-edit/{grn_id}', [App\Http\Controllers\MainController::class, 'editGrn'])->name('grn.edit');
Route::post('grn-update', [MainController::class, 'updateGrn'])->name('grn.update');
Route::get('stock-in/{client_id}', [App\Http\Controllers\MainController::class, 'stockInView'])->name('stock-in');
Route::get('push_stock/{grnd_id}/{product_name}/{grnd_code}/{qty}/{rem}/{length}/{width}/{height}/{product_id}/{client_id}', [App\Http\Controllers\MainController::class, 'push_stock']);
Route::get('check_rack',[App\Http\Controllers\MainController::class, 'check_rack_qty'])->name('check_rack');
Route::get('check_rack_size',[App\Http\Controllers\MainController::class, 'check_rack_size'])->name('check_rack_size');
Route::get('confirm-grn', [App\Http\Controllers\MainController::class, 'push_stack_cnfrm'])->name('confirm-grn');
Route::get('billing/{client_id}', [App\Http\Controllers\MainController::class, 'generateBill']);
Route::get('user-registration', function () {
    return view('user-registration');
});

Route::get('client-invoice/{client_id}/{created_at}', [MainController::class, 'getClientInvoice'])->name('invoice.generate');

Route::get('client/{client_id}/client-product-requests', [App\Http\Controllers\MainController::class, 'getClientProductRequests'])->name('client.product-requests');
Route::any('client/update/stock-request/{product_id}', [App\Http\Controllers\MainController::class, 'updateClientRequestedProductStatus'])->name('client.udpate-stock-request');

Route::post('change-category-status', [MainController::class, 'changeCatStatus'])->name('changeCategoryStatus');

Route::get('index', function(){
    return view('index.index');
});
Route::get('c-reg/warehouse/{wh_id}', function($warehouse_id){
    $legal_types = DB::select('select * from legal_types');
    return view('index.registration', ['legal_types' => $legal_types, 'warehouse_id' => $warehouse_id]);
});

Route::get('clr/{sch_id}/{sch_name}', [MainController::class, 'clr']);
Route::get('subcategories/{category_id}', function($category_id){
    $subcategories = categories::where('parent_id', 0)->with('subcategories')->get();
    dd ($subcategories);
});

Route::post('get-subcategories', [MainController::class, 'getSubCats'])->name('subcategories.get');
Route::post('edit-subcategories', [MainController::class, 'editSubCats'])->name('subcategories.edit');
Route::post('update-subcategories', [MainController::class, 'updateSubCats'])->name('categories.edit-subcategory');
Route::post('delete-subcategory', [MainController::class, 'deleteSubcategory'])->name('subcategories.delete');

Route::get('checkCategoryExistsOrNot', function(){

    $selectedUnits = [6,7,9,8];
    $count = product_item::whereIn('unit_id', $selectedUnits)->get();
    dump(count($count));
    if(count($count)>0){
        dump($count);
        echo "Product has this category";
    }
    else{
        echo "Product does not has this category";
    }

});

Route::get('/client-fulfillment/{client_id}', [MainController::class, 'clientFulfillment'])->name('client.fulfillment');
// Route::post('client-all-products', [MainController::class, 'clientAllProducts'])->name('client.all-products');

Route::post('create-client-fulfillment', [MainController::class, 'createClientFulfillment'])->name('client.create-fulfillment');
Route::get('fulfillments/{client_id}', [MainController::class, 'fulfillmentsIndex'])->name('fulfillments');
Route::get('get-po-details/{req_id}', [MainController::class, 'getPoDetails'])->name('po.details');

Route::get('searchProduct', [MainController::class, 'searchProduct'])->name('searchProduct');


