<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/29
 * Time: 9:33
 */

namespace app\demo\controller;
use think\Loader;

class LoaderStudy
{
    /**
     * 导入扩展类
     * 扩展类里没有命名空间
     */
    public function index()
    {
         dump(Loader::import('ase.AesCrypt',EXTEND_PATH));//引入成功
        Loader::import('ase.AesCrypt',EXTEND_PATH);
        $ase=new \AesCrypt();
        dump($ase->encrypt('18246017461'));
        dump($ase->decrypt('7rsHSEHKZ81riyU95mUEAw'));

        echo EXTEND_PATH;//D:\phpStudy\WWW\tp5\extend\
        Loader::addClassMap('ase\AesCrypt',EXTEND_PATH.'ase\AesCrypt.php');//使用类的映射 实质上就是给扩展类定义一个别名
        dump(Loader::autoload('ase\AesCrypt'));//
        $ase=new \AesCrypt();
    }
}