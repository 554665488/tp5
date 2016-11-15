<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 15:01
 */

namespace app\index\controller;


use app\index\model\Class2 as classModel;
use think\Config;
use think\Controller;
use think\Log;
use app\index\model\User as UserModel;
use think\Request;

class User extends Controller
{
    public function index($page = '1')
    {
        /*  $list=classModel::get($page);
          return view('',['list'=>$list],['__PUBLUIC__'=>'static']);
          exit;*/
        $list = classModel::all();//获取所有数据
//       dump(Config::get('__PUBLIC__'));
        $list = classModel::paginate(3);
//       dump($list);
        $this->assign('list', $list);
        $this->assign('count', count($list));
        $this->assign('title', '动态标题');
//      $this->view->engine->layout('layout','[__REPLACE__]');
        $this->view->replace(['__PUBLIC__' => '/static']);
//       $this->display();
        trace([1, 2, 3]);
        return $this->fetch();
    }

    //用户新增数据
    public function add()
    {
        $user = new UserModel();
//        $user->nickname = '流年';
//        $user->email = 'thinkphp@qq.com';
//        $user->birthday = strtotime('1977-03-05');
//        if ($user->save()) {
//            return '用户[' . $user->nickname . ':' . $user->id . ']新增成功';
//        } else {
//            return $user->getError();
//        }
        //这里使用allowField(true)是为了避免表单令牌验证的字段被写入数据表，如果你已经在模型里面定义了field属性的话，可以不需要。
        if ($user->allowField(true)->validate(true)->save(input('post.'))) {
            return '用户[' . $user->nickname . ':' . $user->id . ']新增成功';
        } else {
            return $user->getError();
        }
    }

    //用户读取数据
    public function read(Request $request, $id)
    {
        $user = UserModel::get($id);
       /* $user = UserModel::getByNickname('流年2');
        $user = UserModel::get(['nickname' => '流年2']);
        $user = UserModel::get(function ($query) {
            $query->where('nickname', '流年2')->where('id', '>', 21);
        });

        echo $user->nickname . '<br/>';
        echo $user->email . '<br/>';
        echo date('Y/m/d', $user->birthday) . '<br/>';*/
//       dump($user->books);
        $info=$user->books()->where('title','ThinkPHP5关联更新1')->find();
        dump($info);
    }

    //定义用户创建数据页面
    public function create()
    {
        return view();
    }

    public function errorInfo()
    {
//       echo $_GET['id'];
        Log::error('错误信息');
    }
}