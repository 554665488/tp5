<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/21
 * Time: 17:41
 */

namespace app\index\controller;


use app\common;
use think\Db;
use think\Request;

class Data extends common
{
    //添加数据
    public function index()
    {
        $result = Db::execute("insert into tp_user (user_id,name) VALUES  (5,'殷凡良')");
        dump($result);//返回影响的行数
    }

    //参数绑定
    public function addBind()
    {
        $db2 = Db::connect('db2');
        $db2->execute("insert into class (id,title,pid) VALUES (?,?,?)", [20, '精美配饰', 0]);
        $res = $db2->query("select * from class WHERE id=?", [20]);
        dump($res);
    }

    //占位符的绑定参数
    public function bindParam()
    {
        $db2 = Db::connect('db2');
        $db2->execute("insert into class (id,title,pid) VALUES (:id,:title,:pid)", ['id' => 21, 'title' => '美化产品', 'pid' => 0]);
        $res = $db2->query("select * from class WHERE id=:id", ['id' => 10]);
        dump($res);
    }

    //查询构造器 基于PDO实现 对于不同的数据库统一语法
    //ThinkPHP 5.0查询构造器使用 PDO参数绑定，以保护应用程序免于 SQL注入，因此传入的参数不需额外转义特殊字符。
    //插入记录
    public function constructorAdd()
    {

        $data = ['user_id' => '10', 'name' => '试试'];
        Db::table('tp_user')->insert($data);
    }

    //更新记录
    public function constructorUpdate($id)
    {
        $data = ['name' => '修改'];
        $res = Db::table('tp_user')->where('id', $id)->update($data);
        dump($res);
    }

    //查询记录
    public function constructorSelect()
    {
        $id = input('id');
        $res = Db::table('tp_user')->select();
        dump($res);
    }

    //删除数据
    public function constructorDel(Request $request)
    {
        $id = input('id');
        $res = Db::name('user')->where('id', $id)->delete();
        if ($res) $this->success('删除成功', 'constructorSelect');
    }

    //使用Db方法创建数据表的对象
    public function easyDb()
    {

        $user_obj = db('user');
        $data = ['user_id' => 19, 'name' => '快捷'];
        $data = ['user_id' => 19, 'name' => '快捷修改'];
        //插入数据
//        $res=$user_obj->insert($data);
        //更新数据
//        $res=$user_obj->where(array('id'=>13))->update($data);
        //查询数据
//        $res=$user_obj->where(array('id'=>13))->select();//where 调用参数不能为空

        //删除数据
        $res = $user_obj->where(array('id' => 2))->delete();
        dump($res);

    }

    //链式操作
    public function listHandle()
    {
        $where['id'] = array('lt', 13);
        $res = Db::name('user')->field(array('user_id', 'name'))->where($where)->order(array('id' => 'desc'))->limit(3)->select();
        dump($res);
    }
    //自动事务操作
    //只需要把需要执行的事务操作封装到闭包里面即可自动完成事务
    public function transaction(){
        Db::transaction(function(){
            Db::name('user')->delete(3);
            $data=['user_id'=>'50','name'=>'到底'];
            Db::name('user')->insert($data);
        });
    }
    //手动控制事务
    public function transactionManual(){
        //开启事务
        Db::startTrans();
        try{
              Db::name('user')->delete(3);
              $data=['user_id'=>'50','name'=>'手动控制事务'];
              Db::name('user')->insert($data);
            //提交事务
              $res=Db::commit();
             dump($res);
        }catch(\Exception $e){
            //事务回滚
            Db::rollback();
        }
    }
    //修改数据
    public function modify(Request $request)
    {
        $id = $request->param('id');
        $request = Db::execute("update tp_user set user_id=10,name='还好' WHERE id=$id");
        dump($request);//返回影响的行数
    }
    //查询数据
    //query方法返回的结果是一个数据集（数组），如果没有查询到数据则返回空数组
    public function read()
    {
        $request = Db::query("select * from tp_user");
        dump($request);
    }

    //删除数据
    public function del($id = '')
    {
        $request = Db::execute("delete from tp_user where id=$id");
        dump($request);//返回影响的行数
    }

    //显示数据库列表
    public function listData()
    {
        $res = Db::query("show tables from tp5");
        dump($res);
    }
    //query方法用于查询，默认情况下返回的是数据集（二维数组），execute方法的返回值是影响的行数。

    //连接其他的库
    public function otherData()
    {
        $res = Db::connect('db2')->query("select * from class ");//connect方法中的配置参数需要完整定义  并且只对当前连接有效：：下次调用Db类的时候使用的默认是数据库连接；
        dump($res);
    }

}