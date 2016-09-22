<?php
namespace app\index\controller;

use app\demo\model\User;
use app\index\model\Class2 as classModel;

class Index
{
    public function index()
    {
        $allList=classModel::all();
        dump($allList);
    }
}
