<?php
//设置时区
date_default_timezone_set('PRC');
//项目根路径
define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
//相对项目路径
define('STIE_PATH', dirname($_SERVER['SCRIPT_NAME']));
//系统配置路径
define('APP_SYS_PATH', dirname(__FILE__));
define('APP_SITE_PATH', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);  //系统分割符
//引入全局函数库
require_once APP_SYS_PATH.DS.'functions.php';

//获取路由解析
$route = getMvcRoute();

//控制器
$mvcController = $route['c'];
//执行方法
$mvcAction = $route['a'];
$mvcControllerName = $mvcController.'Controller';
//加载控制器
$mvcControllerFile = sprintf("%s/app/controller/%s.php",APP_PATH, $mvcControllerName);

if (file_exists($mvcControllerFile)) {
    //加载基类
    require_once APP_SYS_PATH."/controller.php";
    require_once $mvcControllerFile;
    $mvc = new $mvcControllerName();
    //执行前置方法
    $mvc->_before_action();
    //执行用户方法
    $mvc->{$mvcAction}();
    //执行后置方法
    $mvc->_after_action();
} else {
    die('controller NOT FOUND!');
}



