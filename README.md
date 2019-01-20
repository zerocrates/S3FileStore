# S3 FileStore

A module for Omeka S to store files on Amazon S3.

This module is a work in progress and is not feature complete.

After installing the module, you must make some changes to your installation's
`config/local.config.php` file:

```php
    // change the Omeka\File\Store alias
    'service_manager' => [
        'aliases' => [
            'Omeka\File\Store' => 'S3FileStore\S3FileStore',
        ],
    ],

    // add this section; fill in your AWS/S3 details here
    's3_file_store' => [
        'client_params' => [
            'region' => '' // AWS region
            'credentials => [
                'key' => '' // AWS key
                'secret' => '' // AWS secret
            ],
        ],
        'bucket' => // S3 bucket name
    ],
```
