<?php

/**
 * main.php
 *
 * This file holds the configuration settings of your fontend application.
 */
Yii::setPathOfAlias('root', __DIR__ . '/../..');
Yii::setPathOfAlias('common', __DIR__ . '/../../common');
return CMap::mergeArray(
                require(__DIR__ . '/../../common/config/main.php'), array(
            'name' => 'Web3Nhat public',
            'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
            //'defaultController' => 'home',
            // preload components required before running applications
            'preload' => array('log'),
	    //'charset' => 'utf-8',
            'language' => 'vi',
            'import' => array(
                'application.components.*',
                'application.controllers.*',
                'application.models.*',
                'application.classs.*',
                'application.widgets.*',
            ),
            'modules' => array(
                'login',
                'news',
                'introduce',
                'page',
                'site',
                'widget',
                'economy',
                'search',
                'media',
                'suggest',
                'content',
                'work',
                'profile',
                'sms',
                'car'
            ),
            'components' => array(
                'user' => array(
                    'allowAutoLogin' => true,
                ),
                'customer' => array(
                    'class' => 'WebCustomer',
                    'allowAutoLogin' => false,
                ),
                'errorHandler' => array(
                    'errorAction' => 'site/site/error'
                ),
				 'log' => array(
                    'class' => 'CLogRouter',
                    'routes' => array(
                        array(
                            'class' => 'common.extensions.yii-debug.YiiDebugToolbarRoute',
                            'ipFilters' => array('127.0.0.1'),
                        )
                    ),
                ),
            ),
                ), (file_exists(__DIR__ . '/main-env.php') ? require(__DIR__ . '/main-env.php') : array()), (file_exists(__DIR__ . '/main-local.php') ? require(__DIR__ . '/main-local.php') : array())
);
