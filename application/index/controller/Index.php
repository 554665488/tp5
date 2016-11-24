<?php
namespace app\index\controller;

use app\demo\model\User;
use app\index\model\Class2 as classModel;
use org\util\ArrayList;
use think\Cache;
use think\Config;
use think\Controller;
use think\Env;
use think\Request;
use think\Route;
use think\Session;
use app\common\Hook;
use think\Hook as B;
use think\helper\Time;
use app\index\model\Category;
class Index extends Controller
{
    public function index()
    {
      /*  $allList=classModel::all();
        dump($allList);*/
//        Hook::call('Category' , 'index');//钩子的扩展


//        dump(B::get('app_init'));
//        B::listen('app_end');
        // 直接执行行为 如果需要，你也可以不绑定行为标签，直接调用某个行为，使用：
      /*  $params='zhixing';
        $result = B::exec('app\\index\\behavior\\CheckAuth','auth',$params);*/
//        dump(request()->user);

//        dump(Config::load('my_config.php','','index'));
        $Category = new Category;//实例化类
        $category_tree = $Category->category_tree();// 获取整体多级数组树结果

        $this->view->category_list = $Category->category_html($category_tree);//将结果转化为实体html并传值给模板
        return $this->fetch();
//        dump(Request::instance()->server('HTTP_X_REQUESTED_WITH', '', 'strtolower'));
//        Config::set('qq','484428887','index');




    }
    //array 扩展的使用
    public function arrayList(){
        $list=['thinkphp', 'thinkphp', 'topthink', 'topthink','topthink'];
        $arrObj=new ArrayList($list);
//        $arrObj->add('addelement');
//        $arrObj->unique();
//        halt($arrObj->toArray());

//        dump($arrObj->toArray());
        dump($arrObj->unshift('sss'));
        dump($arrObj->toArray());
        dump($arrObj->rsort());
        trace($arrObj);
    }
    public function session(){
        Session::set('name','php');
        halt(Session::get('name'));
    }

}
