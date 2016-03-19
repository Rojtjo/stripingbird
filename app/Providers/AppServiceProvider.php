<?php

namespace App\Providers;

use App\InvoiceRepository;
use Illuminate\Support\ServiceProvider;
use Moneybird\ApiConnector;
use Moneybird\HttpClient;
use Moneybird\XmlMapper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiConnector::class, function ($app) {
            $config = [
                'client' => env('MONEYBIRD_CLIENT'),
                'email' => env('MONEYBIRD_EMAIL'),
                'password' => env('MONEYBIRD_PASSWORD'),
            ];

            $transport = new HttpClient();
            $transport->setAuth(
                $config['email'],
                $config['password']
            );

            return new ApiConnector(
                $config['client'],
                $transport,
                new XmlMapper()
            );
        });

        $this->app->singleton(InvoiceRepository::class, function($app) {
            $connector = $app[ApiConnector::class];
            $invoiceService = $connector->getService('Invoice');

            return new InvoiceRepository($invoiceService);
        });
    }
}
