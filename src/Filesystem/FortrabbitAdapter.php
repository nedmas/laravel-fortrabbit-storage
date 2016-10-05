<?php

namespace Nedmas\FortrabbitStorage\Filesystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class FortrabbitAdapter extends AwsS3Adapter
{
    /**
     * @var string
     */
    protected $storageUrl;

    /**
     * Constructor.
     *
     * @param S3Client $client
     * @param string   $bucket
     * @param string   $prefix
     * @param array    $options
     * @param string   $storageUrl
     */
    public function __construct(S3Client $client, $bucket, $prefix = '', array $options = [], $storageUrl = '')
    {
        parent::__construct($client, $bucket, $prefix, $options);

        $this->setStorageUrl($storageUrl);
    }

    /**
     * Get the storage URL.
     *
     * @return string storage URL
     */
    public function getStorageUrl()
    {
        return $this->storageUrl;
    }

    /**
     * Set the storage URL.
     *
     * @param string $url
     *
     * @return self
     */
    public function setStorageUrl($url)
    {
        $is_empty = empty($url);

        if (!$is_empty) {
            $url = rtrim($url, $this->pathSeparator) . $this->pathSeparator;
        }

        $this->storageUrl = $is_empty ? null : $url;

        return $this;
    }

    /**
     * Get the public URL.
     *
     * @return string public URL
     */
    public function getUrl($path)
    {
        return $this->storageUrl . $this->pathPrefix . $path;
    }
}
