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
            'region' => '<fill in AWS region>',
            'credentials' => [
                'key' => '<fill in AWS key>',
                'secret' => '<fill in AWS secret key>',
            ],
        ],
        'bucket' => '<fill in S3 bucket name>',
    ],

    // alternatively, if using an EC2 role instead of credentials
    's3_file_store' => [
        'client_params' => [
            'region' => '<fill in AWS region>',
        ],
        'bucket' => '<fill in S3 bucket name>',
    ],
```
