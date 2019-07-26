<?php
namespace S3FileStore;

use Aws\DoctrineCacheAdapter;
use Aws\S3\S3Client;
use Doctrine\Common\Cache\ApcuCache;
use finfo;
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

    /**
     * @var finfo
     */
    private $finfo;

    public function __construct($options)
    {
        $clientParams = $options['client_params'];
        if (!isset($clientParams['credentials']) && extension_loaded('apcu')) {
            $clientParams['credentials'] = new DoctrineCacheAdapter(new ApcuCache);
        }
        $this->client = new S3Client($clientParams);
        $this->bucket = $options['bucket'];
        $this->finfo = new finfo(FILEINFO_MIME_TYPE);
    }

    public function put($source, $storagePath)
    {
        $mediaType = $this->finfo->file($source);
        $this->client->putObject([
            'Bucket' => $this->bucket,
            'Key' => $storagePath,
            'SourceFile' => $source,
            'ContentType' => $mediaType,
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
