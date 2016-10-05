<?php

namespace Nedmas\FortrabbitStorage\Providers;

use Aws\S3\S3Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Nedmas\FortrabbitStorage\Filesystem\FortrabbitAdapter;

class FortrabbitStorageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('fortrabbit', function ($app, $config) {
            $s3Config = $config + ['version' => 'latest'];

            if ($s3Config['key'] && $s3Config['secret']) {
                $s3Config['credentials'] = Arr::only($s3Config, ['key', 'secret']);
            }

            $root = isset($s3Config['root']) ? $s3Config['root'] : null;

            $options = isset($config['options']) ? $config['options'] : [];

            $storageUrl = isset($s3Config['storage_url']) ? $s3Config['storage_url'] : null;

            $config = Arr::only($config, ['visibility', 'disable_asserts']);

            return new Filesystem(
                new FortrabbitAdapter(new S3Client($s3Config), $s3Config['bucket'], $root, $options, $storageUrl),
                count($config) > 0 ? $config : null
            );
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
