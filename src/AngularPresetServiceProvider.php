<?php

namespace BENIYOO\AngularPreset;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

/**
 * User: Walter Ribeiro
 * Date: 12/10/2017
 */
class AngularPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('angular', function ($command) {
            AngularPreset::install(false);
            $command->info('Angular 7 scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }

}
