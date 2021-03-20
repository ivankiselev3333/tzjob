<?php

use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    "bootstrap" => ["log"],
    'sourceLanguage' => 'en',
    'language' => 'en',

    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',

            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'application/jsonp' => 'yii\web\JsonpParser',
                'application/xml' => 'yii\web\XmlParser',
                'output' => [
                    'class' => 'common\components\output',
                ],
            ],

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'response' => [
            // ...
            'formatters' => [

                Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    // ...
                ],
            ],
        ],

        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'coreMessages' => array(
                        'basePath' => null,
                    ),
                ],
            ],
        ],
        'urlManager' => [


            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [

                ['class' => 'yii\rest\UrlRule', 'controller' => 'user', 'except' => ['delete'],],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['getrates'],
                    'extraPatterns' => ['GET search' => 'search']
                ],
                '' => 'site/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],

    ],

    'params' => $params,
];
