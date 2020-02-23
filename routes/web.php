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
use App\Http\Middleware\AuthMiddlewareService as AuthMiddlewareServiceLogin;

Route::get('/login',  ['as' => 'auth.get-login', 'uses' => 'Auth\LoginController@login']);
Route::post('/login', ['as' => 'auth.post-login', 'uses' => 'Auth\LoginController@postLogin'])
 ;
Route::group([
    'middleware' => ['authSamacom']
], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'Domain\DomainController@listDomain']);
    Route::get('/notification', ['as' => 'notification', 'uses' => 'Notification\NotificationController@getAllNotification']);
    Route::post('/add-domain', ['as' => 'domain', 'uses' => 'Domain\DomainController@addNewDomain']);
    Route::get('/job-config/{id}',['as' => 'home', 'uses' => 'JobConfig\JobConfigController@viewJobConfig']);
    Route::post('/job-config/{id}',['as' => 'post-job-config', 'uses' => 'JobConfig\JobConfigController@updateConfig']);
    Route::get('/job-config/{id}',['as' => 'get-list-url', 'uses' => 'JobConfig\JobConfigController@viewListUrlLink']);

    Route::post('/add-url',['as' => 'post-url-config', 'uses' => 'JobConfig\JobConfigController@AddUrl']);

    Route::post('/crawl-data',['as' => 'home', 'uses' => 'JobConfig\JobConfigController@addNewConfig']);
    Route::post('/config-crawler-job/{id}',['as' => 'config-crawler-job', 'uses' => 'JobConfig\JobConfigController@configCrawlerJob']);
    Route::post('/job-config-detail/{id}',['as' => 'get-list-url', 'uses' => 'JobConfig\JobConfigDetailController@saveJobConfigDetail']);
    Route::get('/domain-job',['as' => 'domain-job', 'uses' => 'Domain\DomainJobController@index']);
    Route::get('/job-craw-detail/{id}',['as'=>'detail-job', 'uses' =>'Job\JobCrawDetailController@getDetailJobById']);
    Route::post('/domain-job-convert',['as'=>'detail-job', 'uses' =>'Domain\DomainJobController@convertJobProcess']);

    Route::get('/domain-job-convert',['as'=>'detail-job1', 'uses' =>'Domain\DomainJobController@convertJobProcess']);

    Route::get('/notification',['as'=>'get-list-notification', 'uses' =>'Notification\NotificationController@getNotification']);
    Route::get('/get-list-province',['as'=>'get-list-province', 'uses' =>'Province\ProvinceController@getList']);
});
