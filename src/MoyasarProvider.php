<?php
namespace kamalsroor\MoyasarApi;
/*
   Please You May know about test key and live key please visit 
   https://moyasar.com/docs/api
   Or Visit https://dashboard.moyasar.com/session/login to get your keys :)     
   this package created By Kamal Sroor
   if you have questions please join us to facebook group with 
  
*/

use Illuminate\Support\ServiceProvider;
use kamalsroor\MoyasarApi\MoyasarFaced;

class MoyasarProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!file_exists(base_path('config').'/moyasar.php'))
        {
          $this->publishes([__DIR__.'/config'=>base_path('config')]);   
        }

    
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['Moyasar'] = $this->app->share(function($app){
            return new MoyasarFaced;
        });
    }
}
