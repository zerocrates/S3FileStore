<?php
namespace S3FileStore;

return [
    'service_manager' => [
        'factories' => [
            'S3FileStore\S3FileStore' => Service\S3FileStoreFactory::class,
        ],
    ],
    's3_file_store' => [
        'client_params' => [
            'version' => '2006-03-01',
        ],
    ],
];
