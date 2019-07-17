<?php

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'migrate' => [
            'class'                  => 'yii\console\controllers\MigrateController',
            'templateFile'           => '@app/system/console/views/migration.php',
            'generatorTemplateFiles' => [
                'create_table'    => '@app/system/console/template/createTableMigration.php',
                'drop_table'      => '@app/system/console/template/dropTableMigration.php',
                'add_column'      => '@app/system/console/template/addColumnMigration.php',
                'drop_column'     => '@app/system/console/template/dropColumnMigration.php',
                'create_junction' => '@app/system/console/template/createTableMigration.php',
            ]
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];