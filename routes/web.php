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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', 'HomeController@SystemSeting')->name('settings');

Route::resource('member', 'MemberController', ['except'=>['show', 'destroy']]);
Route::get('profile/{id}', 'MemberController@profile')->name('profile');
Route::put('status/{member}', 'MemberController@ChangeStatus')->name('change.status');

Route::resource('saving', 'SavingController', ['only'=>['index', 'create', 'store', 'show']]);
Route::post('deposit', 'SavingController@DepositStore')->name('deposit');

Route::resource('loan', 'LoanController', ['only'=>['index', 'create', 'store', 'show']]);
Route::post('pay-loan', 'LoanController@InstallmentStore')->name('pay.loan');

Route::get('report-shu', 'ReportController@reportShu')->name('report.shu');
Route::get('report-shu-member', 'ReportController@reportShuMember')->name('report.shu-member');
Route::post('total-shu', 'ReportController@showTotalShu')->name('total.shu');
Route::post('member-shu', 'ReportController@showMemberShu')->name('member.shu');
