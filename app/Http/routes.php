<?php

$router->get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

$router->group(['middleware' => ['web']], function ($router) {
    $router->get('/{invoice_id}', [
        'as' => 'payment.show',
        'uses' => 'PaymentController@showPaymentPage',
    ]);
});
