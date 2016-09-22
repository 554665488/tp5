<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 12:42
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class Exercise extends Controller
{
    public $res;

    public function index()
    {
        //查询表达式
        $classModel = Db::name('class');

        $res = $classModel->where('id', 'EQ', '1')->select();//where ('字段','表达式','值')
        dump($res);
    }

    public function in()
    {
        $classModel = Db::name('class');
        $where = ['id' => array('in', array(1, 2))];
        $where = ['id' => ['in', [1, 2]]];
        $res = $classModel->where($where)->select();
        dump($res);
    }

    public function between()
    {
        $classModel = Db::name('class');
        $where = array('id', 'in', [1, 2]);//错误
        $res = $classModel->where('id', 'between', [1, 2])->select();
        dump($res);
    }

    public function moreWhere()
    {
        $classModel = Db::name('class');
        $res = $classModel->where('id', 'between', [1, 6])->where('title', 'like', '%品%')->select();
        dump($res);
    }

    //批量查询
    public function moreQuery()
    {
        $classModel = Db::name('class');
        $where = [
            'id' => ['between', '1,6'],
            'title' => ['like', '%品%']
        ];
        $res = $classModel->where($where)->select();//SELECT * FROM `think_data` WHERE `id` BETWEEN '1' AND '3' AND `name` LIKE '%think%'
        dump($res);
    }

    //or   and
    public function orAnd()
    {
        $classModel = Db::name('class');
        $where = [
            'id' => [['in', [1, 2, 3]], ['between', '8,10'], 'or'],
            'title'=>['like','%品%'],
        ];
        $res = $classModel->where($where)->limit(1)->select();//SELECT * FROM `think_data` WHERE ( `id` IN (1,2,3) or `id` BETWEEN '5' AND '8' ) AND `name` LIKE '%think%' LIMIT 10
        dump($res);
    }
    //快捷查询
    //如果两个两个字段的条件相同
    public function eqWhere(){
        $classModel = Db::name('class');
        $where=['id&pid'=>['>',1]];
        $where=['id|pid'=>['>',1]];
        $res=$classModel->where($where)->select();//SELECT * FROM `think_data` WHERE ( `id` > 0 AND `status` > 0 ) LIMIT 10
        dump($res);
    }
    //视图查询 查询多个表 仅限于查询操作
    public function moreTable(){
        $res=Db::view('class','id,title,pid')->view('class2',['id','title'=>'name','pid'],'class.id=class2.id')->select();
        //SELECT user.id,user.name,user.status,profile.title AS name,profile.phone,profile.email FROM class user INNER JOIN class2 profile ON class.user_id=class2.id WHERE user.status = 1 order by user.id desc
        dump($res);

    }
    //获取一行的一个值
    public function value(){
        $classModel = Db::name('class');
        $v=$classModel->where('id','=',1)->value('title');
        echo $v;
    }
    //获取列数据
    public function column(){
        $classModel = Db::name('class');
        $res=$classModel->where('pid','eq',0)->column('title');
        $res=$classModel->where('pid','eq',0)->column('title','id');//如果希望id为返回数组的索引值
        dump($res);
    }
    //聚合查询
    public function max(){
        $classModel = Db::name('class');
        $v=$classModel->count();
        $v=$classModel->max('id');
        $v=$classModel->avg('id');
        $v=$classModel->sum('id');
        echo $v;
    }
    //字符串查询  配合参数绑定
    public  function str_bind(){
        $classModel = Db::name('class');
        $res=$classModel->where('id > :id AND title IS NOT NULL',['id'=>8])->select();
        dump($res);
    }
    //日期查询
    public function time(){
        $dataModel=Db::name('data');
        $where=['create_time'=>['between',['2016-1-1','2016-10-7']]];
        $res=$dataModel->whereTime('create_time','>','2016-9-10')->select();
        $res=$dataModel->whereTime('create_time','>','-2 days')->select();
        $res=$dataModel->whereTime('create_time','between',['2016-1-1','2016-10-7'])->select();
        $res=$dataModel->whereTime('create_time','between',['2016-1-1','2016-10-7'])->select();
        $res=$dataModel->whereTime('create_time','today')->select();
        $res=$dataModel->whereTime('create_time','yesterday')->select();
        $res=$dataModel->whereTime('create_time','week')->select();
        $res=$dataModel->whereTime('create_time','last week')->select();
        dump($res);
    }
    //分块查询
    public function chunk(){
        $classModel=Db::name('class');
        $where=['id'=>['>',2]];
        $res=$classModel->where($where)->chunk(4,function ($list){
            foreach ($list as $k=>$v){
                   dump($v);
                return false;
            }
        },'id');
    }
}