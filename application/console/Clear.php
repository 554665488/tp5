<?php
namespace app\console;
//指令扩展示例
use think\console\Command;
use think\console\Input;
use think\console\input\Option;
use think\console\Output;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/23
 * Time: 11:17
 * 该指令并不会删除目录，仅仅删除目录下面（包括子目录）的文件。
 */
class Clear extends Command
{
 protected function configure()
 {
     // 指令配置
     $this
         ->setName('clear')
         ->addOption('path', 'd', Option::VALUE_OPTIONAL, 'path to clear', null)
         ->setDescription('Clear runtime file');
 }
 protected  function execute(Input $input, Output $output)
 {
     $path  = $input->getOption('path') ?: RUNTIME_PATH;
     $files = scandir($path);//扫描文件  获取文件里的文件名一数组的形式返回
     if ($files) {
         foreach ($files as $file) {
             if ('.' != $file && '..' != $file && is_dir($path . $file)) {
                 array_map('unlink', glob($path . $file . '/*.*'));
             } elseif (is_file($path . $file)) {
                 unlink($path . $file);
             }
         }
     }
     $output->writeln("Clear Successed");
 }

}