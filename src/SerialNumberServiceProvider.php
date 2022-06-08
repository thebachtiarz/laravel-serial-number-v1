<?php

namespace TheBachtiarz\SerialNumber;

use Illuminate\Support\ServiceProvider;
use TheBachtiarz\SerialNumber\Console\Commands\ServiceStatusCommand;
use TheBachtiarz\SerialNumber\Interfaces\ConfigInterface;

class SerialNumberServiceProvider extends ServiceProvider
{
    /**
     * Register module serial number
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ServiceStatusCommand::class
            ]);
        }
    }

    /**
     * Boot module serial number
     *
     * @return void
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/' . ConfigInterface::SERIAL_NUMBER_CONFIG_NAME . '.php' => config_path(ConfigInterface::SERIAL_NUMBER_CONFIG_NAME . '.php'),
            ], 'thebachtiarz-serialnumber-config');
        }
    }
}
