<?php
/**
 * Application configuration for acceptance tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/config.php'),
    [
        'components' => [   'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=localhost;dbname=photogallery_tests',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]
        ]
    ]
);
