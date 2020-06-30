<?php
/**
 * 命令行执行的脚本
 */
// cli-config.php
require_once "vendor/autoload.php";
$entityManager = Bootstrap::entityManage();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);