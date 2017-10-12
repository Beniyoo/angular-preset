<?php

namespace Walteribeiro\AngularPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Arr;

/**
 * User: Walter Ribeiro
 * Date: 12/10/2017
 */
class AngularPreset extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateBootstrapping();
        static::updateComponent();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                '@angular/common' => '^4.0.0',
                '@angular/compiler' => '^4.0.0',
                '@angular/core' => '^4.0.0',
                '@angular/forms' => '^4.0.0',
                '@angular/http' => '^4.0.0',
                '@angular/platform-browser' => '^4.0.0',
                '@angular/platform-browser-dynamic' => '^4.0.0',
                '@angular/router' => '^4.0.0',
                'core-js' => '^2.4.1',
                'rxjs' => '^5.1.0',
                'zone.js' => '^0.8.4'
            ] + Arr::except($packages, ['jquery', 'vue']);
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(resource_path('assets/js/components/Example.*'));

        copy(__DIR__ . '/angular-stubs/example.component.ts', resource_path('assets/js/components/example.component.ts'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/angular-stubs/app.module.ts', resource_path('assets/js/app.module.ts'));
    }
}