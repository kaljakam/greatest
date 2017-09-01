<?php
/**
 * User: Николай
 * Date: 9/1/2017
 * Time: 11:57
 */

function print_r1($arr) {
  
  $debug = debug_backtrace();
  // Если функция вызывается через print_r2 нет смысла писать: "/usr/home/diman/storeland_git_development_diman/env/production/includes/func/functions_main.php:310" - нам нужна информация откуда реально загружается эта функция.
  $index = 'print_r1' == $debug[0]['function'] && false !== strpos($debug[0]['file'], 'functions_main.php') ? 1 : 0;
  if (isset($debug[ $index ]['file']) && isset($debug[ $index ]['line'])) {
    echo '<code>' . $debug[ $index ]['file'] . ":" . $debug[ $index ]['line'] . '</code>' . "\n";
  }
  unset($index);
  echo "\n<pre>\n";
  print_r($arr);
  echo "</pre>\n";
}

function getVar($name = null) {
  return Yii::$app->request->get($name);
}