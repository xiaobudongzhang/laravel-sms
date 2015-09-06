<?php
namespace LaravelSms;

use Illuminate\Support\ServiceProvider;
use Sms\Ihuyi\Base;
class IhuyiServiceProvider extends ServiceProvider
{

    /**
     * boot process
     */
    public function boot()
    {
        $this->publishes('Config/config.php' => config_path('sms.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom('Config/config.php', 'sms');

        $this->app->bind('Ihuyi', function ($app) {
            $Ihuyi = new Base(
            	config('sms.ihuyi.host'),
            	config('sms.ihuyi.method'),
            	config('sms.ihuyi.user_name'),
            	config('sms.ihuyi.user_name'),
            	);
            return $Ihuyi;
        }
        );
    }
}
