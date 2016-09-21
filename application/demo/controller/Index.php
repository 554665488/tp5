<?php
namespace app\demo\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Base
{

    public function index()
    {
        $data = Db::name('auth_rule')->find();
        dump($data);
        $this->assign('data', $data);
        return $this->fetch();

    }

    public function hello($city = 'moren1', $name = 'moren2')
    {
        echo $city . '--' . $name;
        return $this->fetch();
    }

    //传统方式调用request
    public function del1($id = '1')
    {
        //实例化request的对象
        $request = Request::instance();
        // 获取当前URL地址 不含域名
        echo $request->url();//设置路由规则  /del/1    不启路由规则  /demo/index/del/id/1
        echo "</br>";
        echo '删除的ID' . $id;
    }

    //继承think\Controller
    public function del2($id = '1')
    {
        //实例化request的对象

        // 获取当前URL地址 不含域名
        echo $this->request->url();//设置路由规则  /del/1    不启路由规则  /demo/index/del/id/1
        echo "</br>";
        echo '删除的ID' . $id;
    }



    //自动注入request请求对象
    //方法里的request参数的自动注入的不需URl请求传递
    public function del3(Request $request, $id = '1')
    {
        //实例化request的对象

        // 获取当前URL地址 不含域名
        echo $request->url();//设置路由规则  /del/1    不启路由规则  /demo/index/del/id/1
        echo "</br>";
        //Session('user_id','1');
        echo '删除的ID' . $id;
    }


    //动态绑定属性
    public function del4(Request $request, $id = '1')
    {
        //实例化request的对象

        dump($request);
        echo $request->user;
        //Session('user_id','1');
        echo '删除的ID' . $id;
    }

    //使用request助手调用的request对象的方法
    public function del5(Request $request, $id = '1')
    {
        //实例化request的对象

        $url = request()->url();///demo/index/del/id/1
        echo $url;
        //Session('user_id','1');
        echo '删除的ID' . $id;
    }

    //request 对象的常用方法 z使用自动注入请求对象实现对象的方法的调用
    public function del6(Request $request)
    {
        echo "不需要区分请求的方式3而使用不同的全局变量或方法";
        dump($request->param());///*array(2) {["id"] => string(1) "1"　["name"] => string(3) "yfl"}*/
//        echo $request->param('name');
        $param = $request->param();
        echo $param['name'];
    }

    //使用$request->param 快捷助手函数 input()
    public function del7(Request $request)
    {
        echo "不需要区分请求的方式3而使用不同的全局变量或方法";
        //路由变量指的是路由规则定义的变量或者PATH_INFO地址中的变量 路由变量无法使用get方法或者$_GET变量获取
        dump(input());//input 等于 $request->param()  param()方法会自动判断当前的请求类型  【路由变量】 优先级高于 【$_POST】 的优先级高于$_GET的请求
        dump($_GET); //获取不到路由变量
        echo input('name');

    }

    //param()方法支持变量的过滤和默认值
    public function del8(Request $request)
    {
        echo 'name: ' . $request->param('name', 'age');
        echo 'age: ' . $request->param('name', 'age');

    }

    //除了param方法以外 request对象可以用于获取其它的输入的参数
    public function del9(Request $request)
    {
        echo "get参数";
        dump($request->get());
        echo $request->get('name');
        echo "</br>";
        echo "post";
        dump($request->post());
        echo "</br>";
        echo "cookie参数";
        dump($request->cookie());
        echo "</br>";
        echo "上传文件的信息 image";
        dump($request->file('image'));

    }

    //使用助手函数代替 get()  post  cookie  file()  的方法
    public function del10(Request $request)
    {
        echo "get参数";
        dump(input('get.'));
        echo input('get.name');

        echo "</br>";
        echo "post";
        dump(input('post.'));
        echo input('post.name');
        echo "</br>";
        echo "cookie参数";
        dump(input('cookie.'));
        echo input('cookie.name');
        echo "</br>";
        echo "上传文件的信息 image";
        dump(input('file.'));


    }

    //request 对象的方法使用
    public function del11(Request $request)
    {
        echo "请求的方式---";
        echo $request->method();
        echo "</br>";
        echo "资源类型---";
        echo $request->type();
        echo "</br>";
        echo "访问的Ip---";
        echo $request->ip();
        echo "</br>";
        echo "是否是Ajax请求--";
        echo var_export($request->isAjax(), true);//您可以通过将函数的第二个参数设置为 TRUE，从而返回变量的表示。
        echo "</br>";
        echo "请求的参数--";
        dump($request->param());
        echo "</br>";
        echo "请求的参数仅包括name";
        dump($request->only(['name']));
        echo "</br>";
        echo "把name参数排除";
        dump($request->except(['name']));
        echo "</br>";


    }

    //通过request对象实例获取URl信息
    //url、baseUrl、baseFile、root方法如果传入true，表示获取包含域名的地址。
    public function del12(Request $request)
    {
        echo "获取当前的域名--";
        echo $request->domain();//http://www.tp5.net
        echo "</br>";
        echo '获取当前的入口文件';
        echo $request->baseFile();//   /index.php
        echo "</br>";
        echo "获取当前的URL地址不包含域名";
        echo $request->url();//        /demo/index/del/name/yfl/age/35
        echo "</br>";
        echo '获取完整的URL地址包含域名';
        echo $request->url(true);//   http://www.tp5.net/demo/index/del/name/yfl/age/35
        echo "</br>";
        echo '获取当前的URL地址不包含QUERY_STRING';
        echo $request->baseUrl();//        /demo/index/del/name/yfl/age/35
        echo "</br>";
        echo "获取URL访问ROOT地址";
        echo $request->root();  //空
        echo "</br>";
        echo "获取URL访问ROOT地址带域名";
        echo $request->root(true);//http://www.tp5.net
        echo "</br>";
        echo '获取URl中的PATH_INFO的信息不带域名';
        echo $request->pathinfo();//demo/index/del/name/yfl/age/35.html
        echo "</br>";
        echo '获取URL中的PATH_INFO的信息 不含后缀';
        echo $request->path();//demo/index/del/name/yfl/age/35
        echo "</br>";
        echo "获取URl的后缀";
        echo $request->ext();//html
        echo "</br>";
        echo '获取当前请求的scheme--';
        echo $request->scheme();//http
        echo "</br>";
        echo '获取当前请求的SERVER_PROTOCOL';
        echo $request->protocol();//SERVER_PROTOCOLHTTP/1.1
        echo "</br>";
        echo '获取当前请求的REMOTE_PORT---';
        echo $request->remotePort();//54514

    }

    //获取模块、控制器、操作信息
    public function del13(Request $request)
    {
        echo '模块' . $request->module();
        echo "</br>";
        echo '控制器' . $request->controller();//controller 方法获取是实际 控制器名字
        echo "</br>";
        echo '操作方法' . $request->action();
    }

    //获取路由和调度信息
    public function del14(Request $request)
    {
        echo '路由信息';
        dump($request->routeInfo());
        echo "</br>";
        echo "调度信息";
        dump($request->dispatch());
    }
    //响应对象 Response 对象用于动态响应客户端的请示 控制发送给用户的信息 并将动态生成响应  用户想客户端或浏览器输出

    //自动输出
    public function del15()
    {
        $data = ['name' => '大多数', 'num' => '1235'];
        return $data;//会根据配置的json xml  类型进行输出
    }

    //手动输出
    public function del16()
    {
        $data = ['name' => 'tp5', 'status' => '1'];
//        return json($data,201);//默认的返回的http状态码是200 可以修改
        return json($data, 201, ['Cache-control' => 'no-cache,must-revalidate']);//或者发送更多的头部信息
//        return json($data)->code(201)->header('头部信息');

    }

    //页面跳转
    public function del17(Request $request)
    {

        if ($request->param('id') > 5) {
            $this->success('执行成功！','fun1');//执行成功跳转到到当前的控制器的的fun1方法
        } else {
            $this->error('执行失败','fun2');
        }
    }
    public function fun1(){
        return __FUNCTION__;
    }
    public function fun2(){
        return 'no';
    }

   //重定向
    public function del(){
        $id=input('id');
        if($id>3){
//            $this->redirect('http://thinkphp.cn');
            return redirect('http://thinkphp.cn');
        }else{
            $this->success('ok','fun1');
        }
    }
}
