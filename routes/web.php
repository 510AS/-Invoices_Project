<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckStatus;


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
    return view('auth.login');
});



Auth::routes();

Route::middleware([CheckStatus::class])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('invoices','InvoiceController' );

    Route::resource('sections', 'SectionsController');

    Route::resource('products', 'ProductsController');

    Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');

    Route::get('/section/{id}', 'InvoiceController@getproducts');

    Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@show');

    Route::get('download/{invoice_number}/{file_name}/{type}', 'InvoicesDetailsController@get_file');

    Route::get('View_file/{invoice_number}/{file_name}/{type}', 'InvoicesDetailsController@open_file');

    Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

    Route::get('/edit_invoice/{id}', 'InvoiceController@edit');

    Route::get('/Status_show/{id}', 'InvoiceController@show')->name('Status_show');

    Route::post('/Status_Update/{id}', 'InvoiceController@Status_Update')->name('Status_Update');

    Route::resource('Archive', 'InvoiceAchiveController');

    Route::get('Invoice_Paid','InvoiceController@Invoice_Paid');

    Route::get('Invoice_UnPaid','InvoiceController@Invoice_UnPaid');

    Route::get('Invoice_Partial','InvoiceController@Invoice_Partial');

    Route::get('Print_invoice/{id}','InvoiceController@Print_invoice');

    Route::get('export_invoices', 'InvoiceController@export');

    Route::group(['middleware' => ['auth']], function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

    });

    Route::get('invoices_report', 'Invoices_Report@index');

    Route::post('Search_invoices', 'Invoices_Report@Search_invoices');

    Route::get('customers_report', 'Customers_Report@index')->name("customers_report");

    Route::post('Search_customers', 'Customers_Report@Search_customers');

    Route::get('/{page}', 'AdminController@index');

 });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('invoices','InvoiceController' );

// Route::resource('sections', 'SectionsController');

// Route::resource('products', 'ProductsController');

// Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');

// Route::get('/section/{id}', 'InvoiceController@getproducts');

// Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@show');

// Route::get('download/{invoice_number}/{file_name}/{type}', 'InvoicesDetailsController@get_file');

// Route::get('View_file/{invoice_number}/{file_name}/{type}', 'InvoicesDetailsController@open_file');

// Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

// Route::get('/edit_invoice/{id}', 'InvoiceController@edit');

// Route::get('/Status_show/{id}', 'InvoiceController@show')->name('Status_show');

// Route::post('/Status_Update/{id}', 'InvoiceController@Status_Update')->name('Status_Update');

// Route::resource('Archive', 'InvoiceAchiveController');

// Route::get('Invoice_Paid','InvoiceController@Invoice_Paid');

// Route::get('Invoice_UnPaid','InvoiceController@Invoice_UnPaid');

// Route::get('Invoice_Partial','InvoiceController@Invoice_Partial');

// Route::get('Print_invoice/{id}','InvoiceController@Print_invoice');

// Route::get('export_invoices', 'InvoiceController@export');

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);

// });

// Route::get('/{page}', 'AdminController@index');


