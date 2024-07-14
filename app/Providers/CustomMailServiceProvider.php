<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class CustomMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $mailSettings = Cache::rememberForever('mail-settings',function(){
            $keys = [
                'mail_driver',
                'mail_host',
                'mail_port',
                'mail_username',
                'mail_password',
                'mail_encryption',
                'mail_form_address',
                'mail_receiver_address',
            ];
            return Setting::whereIn('key',$keys)->pluck('value','key');
        });

        // override the mail settings in the config/mail.php file
        if($mailSettings){
            Config::set('mail.default',$mailSettings['mail_driver']);
            Config::set('mail.mailers.smtp.host',$mailSettings['mail_host']);
            Config::set('mail.mailers.smtp.port',$mailSettings['mail_port']);
            Config::set('mail.mailers.smtp.encryption',$mailSettings['mail_encryption']);
            Config::set('mail.mailers.smtp.username',$mailSettings['mail_username']);
            Config::set('mail.mailers.smtp.password',$mailSettings['mail_password']);
            Config::set('mail.from.address',$mailSettings['mail_form_address']);
        }

    }
}
