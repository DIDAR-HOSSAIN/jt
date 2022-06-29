<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//for frontend
Route::get('/', 'HomepageController@index');
Route::get('/about_us', function (){
    return view('frontend.pages.about_us');
});

Route::get('/contact_us', function (){
    return view('frontend.pages.contact_us');
});




//for backend//
//Route::get('/dashboard',function (){
//    return view('backend.layouts.master');
//});


Route::group(['middleware'=>['auth']], function(){
    Route::resource('sliders', 'SliderController');
    Route::get('/search_slider', 'SliderController@search');


    Route::resource('dashboard', 'DashboardController');
    Route::resource('relations', 'RelationController');
    Route::resource('customers', 'CustomerController');
    Route::get('/search', 'CustomerController@search');
//Bank
    Route::resource('virtualbd', 'VirtualbdController');
    Route::resource('balancebd', 'BalancebdController');
//Rocket
    Route::resource('virtualcash', 'VirtualcashController');
    Route::resource('rocket', 'RocketController');
    Route::resource('balancecash', 'BalancecashController');

    Route::resource('incomecategories', 'IncomecategoryController');
    Route::resource('incomes', 'IncomeController');

    Route::resource('expensecategories', 'ExpensecategoryController');
    Route::resource('expenses', 'ExpenseController');

//salary and employee
    Route::resource('employees', 'EmployeeController');
    Route::resource('salaries', 'SalaryController');
    Route::resource('increments', 'IncrementController');
    Route::resource('empSalaries', 'EmployeeSalaryController');

//Reports

//Route::get('commissions', 'ReportController@index');

    Route::get('commiSearch', 'ReportController@searchCommission');
    Route::POST('commissionSearch', 'ReportController@commmissions')->name('commissionSearch');

    Route::get('incomeExpSearch','ReportController@incomeExpenseStm');
    Route::POST('incomeExpense', 'ReportController@incomeExpenseStatement')->name('incomeExpense');

    Route::get('incomeExpenseSearch','ReportController@searchIncomeExpense');
    Route::POST('incomeExpensesmry', 'ReportController@incomeExpenseSummary')->name('incomeExpensesmry');

    Route::get('expensesSearch','ReportController@expenseSearch');
    Route::POST('expensesmry', 'ReportController@expenseSummary')->name('expensesmry');

    Route::get('expSearch','ReportController@expSearch');
    Route::POST('expsmry', 'ReportController@expSummary')->name('expsmry');


//PDF
    Route::get('pdfprint','ReportController@pdf');
    Route::get('test_data',function(){
        return view('backend.customer_info.testCustomer');
    });

//Users Roles and permission
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('jobs', 'JobController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//products
Route::resource('products', 'ProductController');
