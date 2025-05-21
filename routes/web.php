<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('/purchasePost', 'PurchaseOrderController@submit')->name('purchasePost');

//final route here

//dashboard route admin and user
/* Route::get('/dashboard','HomeController@dashboard')->middleware('admin'); */
Route::post('/save-items','HomeController@save_items');
Route::get('/user-dashboard','HomeController@userdashboard')->middleware('user');

/* Route::post('/orders','HomeController@store');

Route::get('/orders','OrderController@index');

Route::get('/myorders','OrderController@myorders')->name('myorders');
Route::get('/myorders','HomeController@myorders')->name('myorders'); */



/* //PDF view + print + download ----ADMIN
Route::get('/items/{id}','OrderController@items');
Route::get('/printPDF/{id}','OrderController@printPDF');
Route::get('/printDirect/{id}','OrderController@printDirect');

//PDF view + print + download ------USER
Route::get('/items/{id}','HomeController@items');
Route::get('/printPDF/{id}','HomeController@printPDF');
Route::get('/printDirect/{id}','HomeController@printDirect');

//get product list
//Route::get('/job-order', 'OrderController@itemlist')->name('job-order');

//print
Route::get('/print','OrderController@print');

Route::get('/testing3','HomeController@testing3'); */

   /* Route::group(['middleware' => ['admin']], function () {
   Route::get('admin-view', 'HomeController@adminView')->name('admin.view');
   }); */

   Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:cache');
    $exitCode = Artisan::call('route:clear');
    return 'DONE'; //Return anything
});

Route::get('/findClientInfo','HomeController@findClientInfo');
Route::get('/findProductList','HomeController@findProductList');

Route::post('/removedata', 'HomeController@removedata');

//Route::get('/select2-autocomplete-ajax','OrderController@dataAjax');


//add item   showAddClient
Route::get('/add-product','ProductListController@showAddItem');
Route::get('/add-client','ProductListController@showAddClient');
//Route::post('/get-records','ProductListController@getRecords')->name('get-records');


//get and update -----product list
Route::get('/product/{item_number}','ProductListController@getProductById')->name('product.getbyid');
Route::post('/updateProduct','ProductListController@updateProduct')->name('updateProduct');
Route::get('/get-records','ProductListController@getRecords')->name('get-records');
Route::post('/save-product','ProductListController@save_product');
//get and update -----client list
Route::get('/client/{clientid}','ClientListController@getClientById')->name('client.getbyid');
Route::post('/updateClient','ClientListController@updateClient')->name('updateClient');
Route::get('/get-clients','ClientListController@getClients')->name('get-clients');
Route::post('/save_clients','ClientListController@save_clients')->name('save_clients');


//get items for P.O server side //erorrrr to may kamukha note note note note note note note note note
/* Route::get('/getItems','ItemListController@getItems')->name('getItems'); */
//manage P.O serverside
Route::get('/getPO','POController@getPO')->name('getPO');
Route::get('/getmyorders','MyOrdersController@getmyorders')->name('getmyorders');


//employee
Route::get('/employee/{id}','HrController@employee');

//serverside select2
Route::post('/selectgetclient','HomeController@selectgetclient')->name('selectgetclient');
/*Route::post('/selectgetproduct','HomeController@selectgetproduct')->name('selectgetproduct');*/

Route::post('/save-orders','HomeController@save_orders');


//manage PO status update
Route::get('changeStatusToApproved', 'OrderController@changeStatusToApproved')->name('changeStatusToApproved');
Route::get('changeStatusToDelivered', 'OrderController@changeStatusToDelivered')->name('changeStatusToDelivered');
Route::get('changeStatusToCanceled', 'OrderController@changeStatusToCanceled')->name('changeStatusToCanceled');

//Store
//Route::get('/pos','PosController@index')->middleware('admin');

Route::get('/pos',[App\Http\Controllers\PosController::class,'index'])->middleware('user');

//store items
Route::get('/getItems','StoreTellerController@storegetItems')->name('getItems');
Route::get('/getItemToReturn','ReturnReplaceController@getItemToReturn')->name('getItemToReturn');

Route::post('/selectgetproduct','StoreTellerController@storeselectgetproduct')->name('selectgetproduct');
Route::get('/storefindProductList','StoreTellerController@storefindProductList');
Route::get('/storefindProductList_v2','StoreTellerController@storefindProductList_v2');
Route::post('/store-save-items','StoreTellerController@store_save_items');

Route::get('/add-store-product','AddStoreProductController@index');
Route::post('/save_store_product','AddStoreProductController@store')->name('save_store_product');
Route::get('/get_store_product','AddStoreProductController@showtable')->name('get-clients');

//super admin dashboard
//Route::get('/dashboard-superadmin','SuperAdminController@index');
Route::get('/pos-dashboard','SuperAdminController@index');
Route::get('/reports','ReportsController@index');
//Route::get('/add-store-product','AddStoreProductController@index'); //duplicate
Route::get('/purchase-order','StorePurchaseOrderController@index');

//store remove data
Route::post('/posremovedata', 'StoreTellerController@posremovedata');
//update discount
Route::post('/updateDiscount', 'StoreTellerController@updateDiscount');
Route::post('/deleteDiscount', 'StoreTellerController@deleteDiscount');

Route::get('/storefindTotalPrice','StoreTellerController@storefindTotalPrice');

//store add_orders
Route::post('/store-save-orders','StoreTellerController@store');
Route::post('/submit-replacement','ReplacementController@submitReplacement');
//Route::get('/salesStat','SuperAdminController@salesStat');

Route::get('/export-excel','ExportExcelController@index');
Route::get('/export-excel-cdj','ExportExcelController@CashDisbursementJournalExport');
//Route::get('/export-excel-monthly','ExportExcelControllerMonthly@index');

Route::get('/cash-receipts-journal','ExportExcelController@CashReceiptsJournalExport');
// STORE SELECT FIND ITEM
Route::get('/findProduct','StorePurchaseOrderController@findProduct');
Route::get('/findProduct_orderlist','StorePurchaseOrderController@findProduct_orderlist');
Route::post('/store_purchase_save_items','StorePurchaseOrderController@store_purchase_save_items');
Route::get('/getPoItems','StorePurchaseOrderController@storegetPoItems')->name('getPoItems');
Route::post('/deletePoStore', 'StorePurchaseOrderController@deletePoStore');
Route::post('/save-po','StorePurchaseOrderController@store');


//STORE ORDER LIST
Route::get('/purchase-order-list','StorePurchaseOrderListController@index');
Route::get('/getPoList','StorePurchaseOrderListController@storegetPoList')->name('getPoList');
Route::post('/processPoStore', 'StorePurchaseOrderListController@processPoStore');


//store product list
Route::get('/item-lists','ViewProductListController@index');
Route::get('/getProductLists','ViewProductListController@getProductLists');


Route::get('/transaction-history','StoreTransactionHistoryController@index');
Route::post('/processVoid', 'StoreTransactionHistoryController@processVoid');

Route::get('/storeGetTransactionHistory','StoreTransactionHistoryController@storeGetTransactionHistory')->name('storeGetTransactionHistory');

Route::get('/ar','StoreArController@index');
Route::get('/journal-entry','JournalEntryController@index');
Route::get('/storeGetAr','StoreArController@storeGetAr')->name('storeGetAr');
Route::post('/processAr', 'StoreArController@processAr');



Route::get('/void-request','StoreVoidRequestController@index');
Route::get('/storeVoidRequest','StoreVoidRequestController@storeVoidRequest')->name('storeVoidRequest');


Route::get('/back-entry','StoreBackEntryRequestController@index');
Route::get('/storeBackEntryRequest','StoreBackEntryRequestController@storeBackEntryRequest')->name('storeBackEntryRequest');
Route::post('/processBackEntry', 'StoreBackEntryRequestController@processBackEntry');


/* Route::get('/ar','StorePurchaseOrderListController@index');
Route::get('/ar','StorePurchaseOrderListController@index');
Route::get('/ar','StorePurchaseOrderListController@index'); */

Route::get('/transaction-history/{id}','StoreInvoiceController@index');


Route::get('/items/{id}','StoreInvoiceController@items');
Route::get('/salesInvoicePrintPDF/{id}','StoreInvoiceController@printPDF');
Route::get('/printDirect/{id}','StoreInvoiceController@printDirect');

Route::post('/updateDateFrom', 'ExportExcelController@updateDateFrom');

Route::post('/updateDashboard', 'SuperAdminController@updateDashboard');

Route::get('/AccountReceivable/{transactionid}','StoreArController@getTransationByid')->name('client.getTransactionByid');

Route::post('/updatePayment','StoreArController@updatePayment')->name('updatePayment');

//Route::get('/ar-invoice','StoreArController@index2');

Route::get('/ar-invoice/{transaction_id}','StoreArController@index2');
Route::get('/return-replace/{transaction_id}','ReturnReplaceController@index2');
/* Route::get('/replacement/{transaction_id}','ReplacementController@index2'); */
Route::get('/replacement/{transaction_id}','ReplacementController@index');

/* joe pos */
Route::get('/replacement-data/{replacement_slip_no}','ReplacementController@replacementData');

/* Route::get('/delete/{transaction_id}','DeleteController@delete'); */
Route::post('/delete','DeleteController@delete');
Route::post('/del-replacement','DeleteController@del_replacement');
Route::post('/del-sub-replacement','DeleteController@del_sub_replacement');
Route::post('/cancel','CancelController@cancel');
Route::get('/sales-invoice/{transaction_id}','SiController@index2');
Route::get('/return-slip/{transaction_id}','ReturnSlipController@index');
Route::get('/order-form/{transaction_id}','OfController@index2');
Route::get('/delivery-reciept/{transaction_id}','DrController@index2');

Route::get('/drPrintPDF/{id}','DrController@drPrintPDF');

Route::post('/atc','StoreArController@atc')->name('atc');
Route::get('/findAtc','StoreArController@findAtc');

Route::post('/updateReturn', 'ReturnReplaceController@updateReturn');

Route::get('/getItemByid/{id}','ReturnReplaceController@getItemByid')->name('client.getItemByid');

Route::get('/pending','PendingController@index');
Route::get('/getPendingDocuments','PendingController@getPendingDocuments')->name('getPendingDocuments');

Route::get('getItemInfoByid/{transaction_id}','ReturnReplaceController@getItemInfoByid')->name('getItemInfoByid');

Route::get('returnProduct/{transaction_id}','ReturnReplaceController@returnProduct')->name('returnProduct');

Route::post('/returnedProduct','StoreReplacedItemsController@returnedProduct');
Route::post('/checkIfAvailable','ReturnReplaceController@checkIfAvailable');
//qweqweqwe
Route::post('/checkStock','StoreReplacedItemsController@checkStock');
Route::post('/store_replaced_items','StoreReplacedItemsController@store_replaced_items');
Route::post('/journalEntry','journalEntryController@journalEntry');

Route::post('/deleteReplaceItem', 'ReturnReplaceController@deleteReplaceItem');

Route::post('/store-save-client','StoreTellerController@storeClient');

Route::post('/storeselectgetclient','StoreTellerController@storeselectgetclient')->name('storeselectgetclient');
Route::get('/storefindClientList','StoreTellerController@storefindClientList');
Route::get('/findItemlotNo','StoreTellerController@findItemlotNo');
Route::get('/findItemlotNo_v2','StoreTellerController@findItemlotNo_v2');
Route::get('/findItemExpiry','StoreTellerController@findItemExpiry');
Route::get('/findItemExpiry_v2','StoreTellerController@findItemExpiry_v2');
Route::get('/findshelf','StoreTellerController@findshelf');
Route::get('/findshelf_v2','StoreTellerController@findshelf_v2');
Route::get('/findRemainingQty','StoreTellerController@findRemainingQty');
Route::get('/findTotalWithAtc','StoreTellerController@findTotalWithAtc');
Route::get('/findshelfgetData','StoreTellerController@findshelfgetData');


Route::get('/pending-documents','PendingDocumentsController@index');
Route::get('/getPendingDocuments','PendingDocumentsController@getPendingDocuments');
Route::post('/updateDocuments','PendingDocumentsController@updateDocuments')->name('updateDocuments');

Route::post('/checkInvoice','StoreTellerController@checkInvoice');

Route::post('/searchInvoice','StoreTellerController@searchInvoice')->name('searchInvoice');
Route::get('/getInvoiceInfo','StoreTellerController@getInvoiceInfo');

/* working */
/* ******************** Inventory Route ******************** */
Route::group(['prefix' => 'inventory',  'middleware' => 'InventoryAuth'], function(){
	Route::get('/', 'InvertoryController@index')->name('inventory-dashboard');
    Route::get('product-management', 'InvertoryController@productManagement')->name('product-management');
    //Route::post('/get-one-product',['uses'=>'InvertoryController@getOneProductReturn','as'=>'get-one-product']);
    Route::post('/get-one-product',['uses'=>'InvertoryController@getOneProduct','as'=>'get-one-product']);
    Route::post('/get-one-product-inventory',['uses'=>'InvertoryController@getOneProduct2','as'=>'get-one-product-inventory']);
    Route::post('/product-list',['uses'=>'InvertoryController@productList','as'=>'product-list']);
    Route::post('/insert-product',['uses'=>'InvertoryController@newproduct','as'=>'insert-product']);
    Route::post('/edit-product','InvertoryController@editproduct')->name('edit-product');
    Route::post('/deleteproduct','InvertoryController@deleteProduct')->name('deleteproduct');

    Route::get('/product-inventory-card/{id1}/{id2}/{id3}/{id4}',['uses'=>'InvertoryController@productInventorycard','as'=>'product-inventory-card']);

    Route::get('/get-product-details-pdf/{id}',['uses'=>'InvertoryController@GetProductDetailsPDF','as'=>'get-product-details-pdf']);
    Route::get('/get-product-details-pdf-2',['uses'=>'InvertoryController@GetProductDetailsPDF_2','as'=>'get-product-details-pdf-2']);

    Route::get('/purchase_order-list',['uses'=>'PurchaseOrderController@index2','as'=>'purchase_order-list']);
    Route::post('/po-list',['uses'=>'PurchaseOrderController@poList','as'=>'po-list']);
    Route::post('/get-po-details',['uses'=>'PurchaseOrderController@GetpoDetails','as'=>'get-po-details']);
    Route::get('/purchaseOrder', 'PurchaseOrderController@Poform')->name('purchaseOrder');
    Route::get('/getPoItems','PurchaseOrderController@storegetPoItems')->name('getPoItems');
    Route::post('/selectgetproduct_PO','PurchaseOrderController@storeselectgetproduct')->name('selectgetproduct_PO');
    Route::post('/selectgetSupplier','PurchaseOrderController@storeselectgetSupplier')->name('selectgetSupplier');
    Route::get('/receive-po/{id}','PurchaseOrderController@getOnePo')->name('receive-po');
    Route::post('/get-invoice','PurchaseOrderController@getInvoce')->name('get-invoice');
    Route::post('/set-product-details','PurchaseOrderController@setProductDetails')->name('set-product-details');
    Route::post('/set-invoice','PurchaseOrderController@setInvoice')->name('set-invoice');
    Route::get('/edit-po/{id}','PurchaseOrderController@editPO')->name('edit-po');
    Route::post('/update-po','PurchaseOrderController@updatePO')->name('update-po');
    Route::get('/po-receive-list','PurchaseOrderController@po_receive_data')->name('po-receive-list');
    Route::post('/get-po-product','PurchaseOrderController@get_po_product')->name('get-po-product');
    Route::get('/receive-product/{invoice}/{product}/{po}','PurchaseOrderController@getproductsOrder')->name('receive-product');
    Route::post('/set-invoice-form','PurchaseOrderController@setInvoiceForm')->name('set-invoice-form');
    Route::get('/get-po-details-pdf/{id}',['uses'=>'PurchaseOrderController@GetpoDetailsPDF','as'=>'get-po-details-pdf']);
    Route::get('/get-po-details-pending-pdf/{id}',['uses'=>'PurchaseOrderController@GetpoDetailsPendingPDF','as'=>'get-po-details-pending-pdf']);
    Route::post('/del-receive-po','PurchaseOrderController@del_receive_po')->name('del-receive-po');
    Route::post('/submit-po','PurchaseOrderController@submit_po')->name('submit-po');
    Route::post('/change-product','PurchaseOrderController@changeProduct')->name('change-product');

    Route::get('/get-po-list-pdf/{id}',['uses'=>'PurchaseOrderController@GetpoListPDF','as'=>'get-po-list-pdf']);

    Route::get('/branch-management','OtherController@branchManagement')->name('branch-management');
    Route::post('/branch-list',['uses'=>'OtherController@branchList','as'=>'branch-list']);
    Route::post('/insert-branch',['uses'=>'OtherController@newbranch','as'=>'insert-branch']);
    Route::post('/get-one-branch','OtherController@getOnebranch')->name('get-one-branch');
    Route::post('/edit-branch','OtherController@editbranch')->name('edit-branch');
    Route::post('/deletebranch','OtherController@deletebranch')->name('deletebranch');



    Route::get('/brand-management','brandController@brandManagement')->name('brand-management');
    Route::post('/brand-list',['uses'=>'brandController@brandList','as'=>'brand-list']);
    Route::post('/insert-brand',['uses'=>'brandController@newbrand','as'=>'insert-brand']);
    Route::post('/get-one-brand','brandController@getOnebrand')->name('get-one-brand');
    Route::post('/edit-brand','brandController@editbrand')->name('edit-brand');
    Route::post('/deletebrand','brandController@deletebrand')->name('deletebrand');
    Route::post('/brandAutoComplete','brandController@brandAutoComplete')->name('brandAutoComplete');



    Route::get('/unit-management','OtherController@unitManagement')->name('unit-management');
    Route::post('/unit-list',['uses'=>'OtherController@unitList','as'=>'unit-list']);
    Route::post('/insert-unit',['uses'=>'OtherController@newunit','as'=>'insert-unit']);
    Route::post('/get-one-unit','OtherController@getOneunit')->name('get-one-unit');
    Route::post('/edit-unit','OtherController@editunit')->name('edit-unit');
    Route::post('/deleteunit','OtherController@deleteunit')->name('deleteunit');

    Route::get('/supplier-list',['uses'=>'supplierController@index','as'=>'supplier-list']);
    Route::post('/supplier-list-data',['uses'=>'supplierController@index_data','as'=>'supplier-list-data']);


    Route::get('/supplier-list',['uses'=>'supplierController@index','as'=>'supplier-list']);
    Route::post('/supplier-list-data',['uses'=>'supplierController@index_data','as'=>'supplier-list-data']);
    Route::post('/insert-supplier',['uses'=>'supplierController@newsupplier','as'=>'insert-supplier']);
    Route::post('/get-one-supplier',['uses'=>'supplierController@getOneSupplier','as'=>'get-one-supplier']);
    Route::post('/edit-supplier',['uses'=>'supplierController@editSupplier','as'=>'edit-supplier']);

    /* invoice inventory */
    Route::get('/invoice-list',['uses'=>'InvoiceController@index','as'=>'invoice-list']);
    Route::post('/invoice-list-data',['uses'=>'InvoiceController@dataList','as'=>'invoice-list-data']);
    Route::get('/invoice-data-pdf/{id}',['uses'=>'InvoiceController@invoicePDFData','as'=>'invoice-data-pdf']);
    Route::get('/edit-invoice/{id}',['uses'=>'InvoiceController@editInvoice','as'=>'edit-invoice']);
    Route::post('/get-one-transaction',['uses'=>'InvoiceController@getOnetransactionReturn','as'=>'get-one-transaction']);
    Route::post('/update-one-transaction',['uses'=>'InvoiceController@updateOnetransactionReturn','as'=>'update-one-transaction']);

    Route::post('/save-one-return',['uses'=>'InvoiceController@saveReturn','as'=>'save-one-return']);
    Route::post('/delete-replacement',['uses'=>'InvoiceController@deleteReplacement','as'=>'delete-replacement']);
    Route::post('/return-list-data',['uses'=>'InvoiceController@returndatalist','as'=>'return-list-data']);
    Route::get('/return-list',['uses'=>'InvoiceController@returnList','as'=>'return-list']);
    Route::get('/replace-print/{id}',['uses'=>'InvoiceController@replacePrint','as'=>'replace-print']);
    Route::post('/returnItem',['uses'=>'InvoiceController@returnItem','as'=>'returnItem']);
    Route::post('/rejectedItem',['uses'=>'InvoiceController@rejectedItem','as'=>'rejectedItem']);
    Route::post('/delelteItem',['uses'=>'InvoiceController@delelteItem','as'=>'delelteItem']);
    
    
    Route::get('/replace-return-view/{id}',['uses'=>'InvoiceController@replaceReturnList','as'=>'return-list']);
    Route::post('/replace-data-list',['uses'=>'InvoiceController@returndatalistrecieve','as'=>'replace-data-list']);

    Route::get('/return-view-page/{id}',['uses'=>'InvoiceController@returnView','as'=>'return-view-page']);

    Route::get('/invoice-list-return/{id}',['uses'=>'InvoiceController@returnViewList','as'=>'invoice-list-return']);
    Route::post('/set-return-details','PurchaseOrderController@setReturnDetails')->name('set-return-details');


    Route::get('/critical-Product','stocksInventoryController@criticalProduct')->name('critical-Product');
    Route::post('/get-critical-Product','stocksInventoryController@getcriticalProduct')->name('get-critical-Product');
    Route::get('/product-data-critacal-pdf','stocksInventoryController@productDataCriticalListPdf')->name('product-data-critacal-pdf');


    Route::get('/expired-Product','stocksInventoryController@expiredProduct')->name('expired-Product');
    Route::post('/get-expired-Product','stocksInventoryController@getExpiredProduct')->name('get-expired-Product');
    Route::get('/get-expired-Product-pdf','stocksInventoryController@getExpiredProductPdf')->name('get-expired-Product-pdf');

    /* product inventory */
    Route::get('/Product-inventory','stocksInventoryController@productInventory')->name('Product-inventory');
    Route::post('/Product-inventory-data','stocksInventoryController@productInventoryDataList')->name('Product-inventory-data');
    //Route::get('/product-inventory-data-pdf','stocksInventoryController@productInventoryDataListPdf')->name('product-inventory-data-pdf');
    Route::get('/product-inventory-data-pdf/{dateEnd}','stocksInventoryController@productInventoryDataListPdfexcel')->name('product-inventory-data-pdf');
    Route::get('/product-inventory-data-pdf-all','stocksInventoryController@productInventoryDataListPdfexcelAll')->name('product-inventory-data-pdf');
    Route::get('/product-inventory-view/{id}/{location_address}/{rock}/{shelf}/{exp}/{lot}','stocksInventoryController@productInventoryView')->name('Product-inventory-view');
    Route::post('/productViewData','stocksInventoryController@productInventoryViewData')->name('productViewData');
    Route::post('/delete-tranction-history','stocksInventoryController@detetransactionhistory')->name('detetransactionhistory');


    Route::get('/proceess-Product-inventory-data','stocksInventoryController@processProductInventoryDataList')->name('proceess-Product-inventory-data');

    /*  loaction Mangement*/
    Route::get('/location-management','locationController@index')->name('location-management');
    Route::post('/insert-location',['uses'=>'locationController@newLocation','as'=>'insert-location']);
    Route::post('/insert-locatio-2',['uses'=>'locationController@newLocation_2','as'=>'insert-locatio-2']);
    Route::post('/get-one-location',['uses'=>'locationController@getLocation','as'=>'get-one-location']);
    Route::post('/edit-location',['uses'=>'locationController@editLocation','as'=>'edit-location']);

    /* add product */
    Route::get('/addProductInventory',['uses'=>'productInventoryManual@creatProduct','as'=>'addProductInventory']);
    Route::post('/save-addProductInventory',['uses'=>'productInventoryManual@save_Product','as'=>'save-addProductInventory']);
    Route::post('/edit-addProductInventory',['uses'=>'productInventoryManual@edit_Product','as'=>'edit-addProductInventory']);
    Route::post('/delete-addProductInventory',['uses'=>'productInventoryManual@delete_Product_manual','as'=>'delete-addProductInventory']);
    Route::get('/list-addProductInventory',['uses'=>'productInventoryManual@list_Product','as'=>'list-addProductInventory']);
    Route::post('/data-addProductInventory',['uses'=>'productInventoryManual@list_data_Product','as'=>'data-addProductInventory']);
    Route::get('/product-inventory-data-pdf-manual','productInventoryManual@productInventoryDataListPdf')->name('product-inventory-data-pdf-manual');
    Route::get('/edit-adjustment/{id}','productInventoryManual@edit_adjustment')->name('edit-adjustment');

    
    Route::get('/user-management','userController@index')->name('user-management');

    Route::post('/edit-user-management','userController@getOneser')->name('edit-user-management');
    Route::post('/update-user-management','userController@updategetOneser')->name('update-user-management');

    /* import */
    Route::get('/import-productdata','productInventoryManual@importview')->name('import-productdata');

    /* price addjust */
    Route::get('/product-price-adjust','productInventoryManual@priceAdjust')->name('product-price-adjust');
    Route::post('/product-price-adjust-data',['uses'=>'productInventoryManual@price_data_Product','as'=>'product-price-adjust-data']);
    Route::post('/product-price-adjust-data-dashboard',['uses'=>'productInventoryManual@price_data_Product_dashboard','as'=>'product-price-adjust-data-dashboard']);
    Route::post('/product-price-adjust-update',['uses'=>'productInventoryManual@price_update_Product','as'=>'product-price-adjust-update']);

    /* registration */
    Route::post('/registration-member',['uses'=>'membrRegistration@registration_member','as'=>'registration-member']);

    /* profile */
    Route::get('/profile/{id}',['uses'=>'userController@profileData','as'=>'profile']);
    Route::post('/updateProfile',['uses'=>'userController@updateProfile','as'=>'updateProfile']);

    Route::post('/crticalLevel',['uses'=>'ProductListController@critical_level','as'=>'critical_level']);

    /* relcation */
    Route::get('/relocation/{id}/{location_address}/{rock}/{shelf}/{exp}/{lot}',['uses'=>'relocationController@index','as'=>'relocation']);
    Route::post('/relocationExpiry',['uses'=>'relocationController@relocationExpiry','as'=>'relocationExpiry']);
    Route::post('/saveRelocation',['uses'=>'relocationController@saveRelocation','as'=>'saveRelocation']);

    Route::post('/reprocessData',['uses'=>'testController@reprocessData','as'=>'reprocessData']);
    Route::get('/reprocessDataView',['uses'=>'testController@reprocessDataView','as'=>'reprocessDataView']);
});


//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//create permission

Route::get('/user-permission-view',['uses'=>'UserPermissionController@getPermissionView','as'=>'user-permission-view']);
Route::post('/get-one-user',['uses'=>'UserPermissionController@getOneUserPermission','as'=>'getOneUser']);
Route::post('/inventory-permission-add',['uses'=>'UserPermissionController@addInventoryPermission','as'=>'inventory-permission-add']);
Route::post('/inventory-permission-edit',['uses'=>'UserPermissionController@editInventoryPermission','as'=>'inventory-permission-edit']);

Route::post('/pos-permission-add',['uses'=>'UserPermissionController@addPosPermission','as'=>'pos-permission-add']);
Route::post('/pos-permission-add-data',['uses'=>'UserPermissionController@addPosPermissionData','as'=>'pos-permission-add-data']);
Route::post('/pos-permission-edit-data',['uses'=>'UserPermissionController@editPosPermissionData','as'=>'pos-permission-edit-data']);


Route::post('/user-data-filter',['uses'=>'userController@userDataFilter','as'=>'user-data-filter']);

Route::get('/data-import-excel',['uses'=>'MyController@importExportView','as'=>'data-import-excel']);
Route::post('/import',['uses'=>'MyController@import','as'=>'import']);
Route::post('/export',['uses'=>'MyController@export','as'=>'export']);
