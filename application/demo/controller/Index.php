<?php
namespace app\demo\controller;

use think\Controller;
use think\Db;

class Index extends controller
{
    public function index()
    {
        $data=Db::name('auth_rule')->find();
        dump($data);
        $this->assign('data',$data);
        return $this->fetch();

    }
    public function hello($city='moren1',$name='moren2'){
         echo $city.'--'.$name;
    }
}
