#!/usr/bin/env php
<?php

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');

error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));
! defined('SWOOLE_HOOK_FLAGS') && define('SWOOLE_HOOK_FLAGS', 0);
! defined('START_TIME') && define('START_TIME', time());    // 启动时间
! defined('HF_VERSION') && define('HF_VERSION', '3.0');     // 定义hyperf版本号

require BASE_PATH . '/vendor/autoload.php';

// 载入公共函数库文件
foreach (glob(BASE_PATH . '/common/*') as $file) {
    include_once($file);
}

// Self-called anonymous function that creates its own scope and keep the global namespace clean.
(function () {
    Hyperf\Di\ClassLoader::init(handler: new Hyperf\Di\ScanHandler\ProcScanHandler());
    /** @var Psr\Container\ContainerInterface $container */
    $container = require BASE_PATH . '/config/container.php';
    /** @var Symfony\Component\Console\Application $application */
    $application = $container->get(Hyperf\Contract\ApplicationInterface::class);
    $application->run();
})();
