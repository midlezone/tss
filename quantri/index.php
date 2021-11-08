<?php
error_reporting(0);
ini_set('display_errors', true);
date_default_timezone_set('Asia/Ho_Chi_Minh');

// change the following paths if necessary
//$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

chdir(dirname(__FILE__) . '/..');
//require_once('common/lib/Yii/yii.php');
$yii = (dirname(__FILE__) . '/..').'/common/lib/yii-framework-1.1.15/yii.php';
require_once($yii);
require_once('common/components/WebApplication.php');
require_once('common/lib/global.php');
require_once('protected/components/BackofficeWebApplication.php');
$app = Yii::createApplication('BackofficeWebApplication', $config);
$app->run();
