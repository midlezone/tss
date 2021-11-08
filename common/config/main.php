<?php

/**
 * main.php
 *
 * Common configuration file for backoffice and public applications
 */
require(dirname(__FILE__) . "/SiteGlobal.php");
Yii::setPathOfAlias('root', __DIR__ . '/../..');
Yii::setPathOfAlias('common', __DIR__ . '/../../common');

require(dirname(__FILE__) . "/const.php");
return array(
    'charset' => 'utf-8',
    'language' => 'vi',
    'import' => array(
        'common.components.*',
        'common.models.*',
        'common.models.libs.*',
        'common.models.news.*',
        'common.models.settings.*',
        'common.models.media.*',
        'common.models.widgets.*',
        'common.models.interface.*',
        'common.models.economy.*',
        'common.models.sms.*',
        'common.models.car.*',
        'common.classs.*',
        'common.widgets.*',
    ),
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=tss',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '@0874e33h@',
            'charset' => 'utf8',
            'initSQLs' => 'set names utf8;',
            'enableProfiling' => true,
        //'schemaCachingDuration' => YII_DEBUG ? 0 : 8640000, // 100 days
        //'enableParamLogging' => YII_DEBUG,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '',
        ),
//        'cache' => extension_loaded('apc') ?
//                array(
//            'class' => 'CApcCache',
//                ) :
//                array(
//            'class' => 'CDbCache',
//            'connectionID' => 'db',
//            'autoCreateCacheTable' => true,
//            'cacheTableName' => 'cache',
//                ),
        'cache' => array(
            'class' => 'ClaCache',
            'useMemcached' => true,
            'keyPrefix' => 'w3n',
            'servers' => array(
                array(
                    'host' => 'localhost',
                    'port' => 1168,
                    'weight' => 60,
                ),
            ),
        ),
        'cachefile' => array(
            'class' => 'ClaCacheFile',
        ),
        'clientScript' => array(
            'class' => 'ClientScript',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
//				array(
//					'class'=>'CFileLogRoute',
//					'levels'=>'error, warning',
//				),
//                array(// configuration for the toolbar of yiidebugbt
//                    'class' => 'XWebDebugRouter',
//                    'config' => 'alignRight, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
//                    'levels' => 'error, warning, trace, profile, info',
//                    'allowedIPs' => array('127.0.0.1', '::1', '192.168.4.[0-9]{3}', '192\.168\.[0-5]{1}\.[0-9]{3}'),
//                    'ignoremodule' => array('api,media'),
//                )
            ),
        ),
        'assetManager' => array(
            'class' => 'UAssetManager',
        ),
        'messages' => array('basePath' => Yiibase::getPathOfAlias('common.messages')),
        'mailer' => array(
            'class' => 'W3NPHPMailer',
            'Host' => 'pro07.emailserver.vn',
            'Username' => 'levananh@oceanbeauty.vn',
            'Password' => '123123aB@',
            'Port' => 465,
            'SMTPSecure' => 'ssl',
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);

