<?php
return [
    'id' => 'common',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'controllerNamespace' => 'common\controllers',
    'bootstrap' => null,
    'components' => [
        'request' => [
            'cookieValidationKey' => 'kake#maiqi',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval' => YII_DEBUG ? 1 : 1000,
            'targets' => [
                [
                    'class' => 'common\inherit\FileTargetLogger',
                    'exportInterval' => YII_DEBUG ? 1 : 1000,
                    'levels' => YII_DEBUG ? [
                        'trace',
                        'warning',
                        'info',
                        'error'
                    ] : [
                        'info',
                        'error'
                    ],
                    'logFile' => '@app/runtime/logs/debug.log',
                    'logVars' => [],
                    'maxLogFiles' => 20
                ]
            ],
        ],
        'user' => [
            'identityClass' => [],
        ],
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ]
            ],
        ],
        // Custom components
        'reflection' => [
            'class' => 'common\components\Reflection'
        ],
        'rsa' => [
            'class' => 'common\components\Rsa',
            'publicKey' => '@rsa/rsa_public.pem',
            'privateKey' => '@rsa/rsa_private.pem',
        ],
        'api' => [
            'class' => 'common\components\Service'
        ],
        'ubb' => [
            'class' => 'common\components\Ubb'
        ],
        'download' => [
            'class' => 'common\components\Download'
        ],
        'upload' => [
            'class' => 'common\components\Upload',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
        // https://easywechat.org/zh-cn/docs/configuration.html
        'wx' => [
            'class' => 'common\components\WeChat',
            // 基本
            'debug' => false,
            'app_id' => 'wxba7ce615bf0fb999',
            'secret' => 'e45ec3b51e33e1920074464a21535889',
            'token' => 'WECHAT4KAKE',
            'aes_key' => 'XeNxDbmaOTu0AquaN7LQgHrCFzrFb2eQ7qyjYduoh44',
            // 授权
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => null,
            ],
            // 支付
            'payment' => [
                'merchant_id' => '1453361802',
                'key' => '123456789123456789123456789abcde',
                'cert_path' => '@wechat/cert/apiclient_cert.pem',
                'key_path' => '@wechat/cert/apiclient_key.pem',
            ],
        ],
        'ali' => [
            'class' => 'common\components\AliPay',
            'options' => [
                'rsa_private_key' => '@alipay/key/rsa_app.private',
                'pay_public_key' => '@alipay/key/rsa_alipay.public',
            ],
            'params' => [
                'app_id' => '2017040106517153',
            ],
        ],
    ],
];
