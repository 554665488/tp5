<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/22
 * Time: 15:01
 */

namespace app\index\controller;


use app\index\model\Book;
use app\index\model\Class2 as classModel;
use app\index\model\Profile;
use app\index\model\Role;
use think\Config;
use think\Controller;
use think\Db;
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
        Db::name('user')->where('id','eq','2')->setInc('status',1);
        Db::name('user')->where('id','eq','2')->setField('delete_time',1);
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

    //关联写入数据
    public function add_profile()
    {
        $user = new UserModel();
        $user->nickname = '关联写入';
        $user->email = '281000567@qq.com';
        $user->name = 'thinkphp';
        $user->password = '123456';
        if ($user->save()) {
            //关联写入数据
            $profile = new Profile;
            $profile->truename = '刘晨';
            $profile->birthday = '1977-03-05';
            $profile->address = '中国上海';
            $profile->email = 'thinkphp@qq.com';
            $user->profile()->save($profile);
            return '用户新增成功';
        } else {
            return $user->getError();
        }
    }

    //关联写入数据
    public function add_book($id)
    {
        $user = UserModel::get($id);
        $book = new Book();
        $book->title = 'thinkphp5';
        $book->publish_time = '2016-11-16';
        $user->books()->save($book);
        return "用户Book成功";
    }

    //关联查询
    public function read_has($id)
    {
        $user = UserModel::get($id, 'profile');//使用预载入查询来提高查询性能
        dump($user);
        dump($user->profile);//一对一的关联查询很简单，直接把关联对象当成属性来用即可，例如：
        echo $user->name . '<br/>';
        echo $user->nickname . '<br/>';
        echo $user->profile->truename . '<br/>';
        echo $user->profile->email . '<br/>';
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
        $info = $user->books()->where('title', 'ThinkPHP5关联更新1')->find();//模型没有链式操作，所有链式操作都是调用的数据库类Db；
        dump($info);
    }

    // 查询有写过书的作者列表
    public function read2()
    {
        // 查询有写过书的作者列表
        $user = UserModel::has('books')->select();
        dump($user);
    }

    //用户权限多对多增加数据
    public function add_roles()
    {
        $user = UserModel::getByNickname('关联书');
        // 新增用户  、 角色 并自动写入枢纽表
        $user->roles()->save(['name' => 'editor', 'title' => '编辑']);//saveall批量添加数据
        return '用户角色新增成功';
    }

    //用户新增数据
    public function add_roles2($id)
    {
        $user = UserModel::get($id);
        $role = Role::getByName('editor');
        $user->roles()->attach($role);
        return "分配权限成功";
    }

    //关联角色删除
    public function delete_role($id)
    {
        $user = UserModel::get($id);
        $role = Role::get(3);
        $user->roles()->detach($role);//可以使用detach方法删除关联的枢纽表数据
        return '用户角删除成功';
    }

    //关联查询
    public function read_role()
    {
        //获取某个用户的所有角色的话，直接使用：
        $user=UserModel::get(15);
        dump($user->toJson());
        trace($user->toJson());
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