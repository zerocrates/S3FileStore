<?php
namespace S3FileStore;

use Aws\S3\S3Client;
use Omeka\File\Store\StoreInterface;

class S3FileStore implements StoreInterface
{
    /**
     * @var Aws\S3\S3Client
     */
    private $client;

    /**
     * @var string
     */
    private $bucket;

    public function __construct($options)
    {
        $clientParams = $options['client_params'];
        $this->client = new S3Client($clientParams);
        $this->bucket = $options['bucket'];
    }

    public function put($source, $storagePath)
    {
        $this->client->putObject([
            'Bucket' => $this->bucket,
            'Key' => $storagePath,
            'SourceFile' => $source,
        ]);
    }

    public function delete($storagePath)
    {
        $this->client->deleteObject([
            'Bucket' => $this->bucket,
            'Key' => $storagePath,
        ]);
    }

    public function getUri($storagePath)
    {
        return $this->client->getObjectUrl($this->bucket, $storagePath);
    }

}
