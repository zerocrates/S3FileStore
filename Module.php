<?php
namespace S3FileStore;

use Omeka\Module\AbstractModule;
use Laminas\Mvc\MvcEvent;

class Module extends AbstractModule
{
    public function getConfig()
    {
        return require __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        parent::onBootstrap($event);

        require __DIR__ . '/vendor/autoload.php';
    }
}
