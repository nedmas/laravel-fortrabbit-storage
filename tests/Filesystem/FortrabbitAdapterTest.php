<?php

namespace Nedmas\FortrabbitStorage\Filesystem;

class FortrabbitAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider storageUrlProvider
     */
    public function testSetStorageUrl($storageUrl, $expected)
    {
        $s3Client = $this->createMock(\Aws\S3\S3Client::class);

        $adapter = new FortrabbitAdapter($s3Client, 'foo');

        $adapter->setStorageUrl($storageUrl);

        $this->assertEquals($expected, $adapter->getStorageUrl());
    }

    /**
     * @dataProvider urlProvider
     */
    public function testGetUrl($storageUrl, $prefix, $path, $expected)
    {
        $s3Client = $this->createMock(\Aws\S3\S3Client::class);

        $adapter = new FortrabbitAdapter($s3Client, 'foo', $prefix, [], $storageUrl);

        $this->assertEquals($expected, $adapter->getUrl($path));
    }

    public function storageUrlProvider()
    {
        return [
            ['http://example.com', 'http://example.com/'],
            ['http://example.com/', 'http://example.com/'],
        ];
    }

    public function urlProvider()
    {
        return [
            ['http://example.com', null, 'foo.txt', 'http://example.com/foo.txt'],
            ['http://example.com', 'foo', 'bar.txt', 'http://example.com/foo/bar.txt'],
        ];
    }
}
