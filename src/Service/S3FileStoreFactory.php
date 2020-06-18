<?php
namespace S3FileStore\Service;

use Interop\Container\ContainerInterface;
use S3FileStore\S3FileStore;
use Laminas\ServiceManager\Factory\FactoryInterface;

class S3FileStoreFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config = $serviceLocator->get('Config');
        return new S3FileStore($config['s3_file_store']);
    }
}
