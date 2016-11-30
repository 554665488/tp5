<?php
//000000000010a:2:{i:0;s:24564:"<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>创建用户</title>
    <style>
        body {
            font-family:"Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size:16px;
            padding:5px;
        }
        .form{
            padding: 15px;
            font-size: 16px;
        }

        .form .text {
            padding: 3px;
            margin:2px 10px;
            width: 240px;
            height: 24px;
            line-height: 28px;
            border: 1px solid #D4D4D4;
        }
        .form .btn{
            margin:6px;
            padding: 6px;
            width: 120px;

            font-size: 16px;
            border: 1px solid #D4D4D4;
            cursor: pointer;
            background:#eee;
        }
        a{
            color: #868686;
            cursor: pointer;
        }
        a:hover{
            text-decoration: underline;
        }
        h2{
            color: #4288ce;
            font-weight: 400;
            padding: 6px 0;
            margin: 6px 0 0;
            font-size: 28px;
            border-bottom: 1px solid #eee;
        }
        div{
            margin:8px;
        }
        .info{
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .copyright{
            margin-top: 24px;
            padding: 12px 0;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
<h2>创建用户</h2>
<FORM method="post" class="form" action="/demo/demand_var/type.html" >
    昵 称：<INPUT type="text" class="text" name="nickname"><br/>
    邮 箱：<INPUT type="text" class="text" name="email"><br/>
    生 日：<INPUT type="text" class="text" name="birthday"><br/>

    <input type="hidden" name="__token__" value="fab99d0de441c8c8a8aaf44f3aeddbab" />
    <input type="hidden" name="_method" value="DELETE" />
    <INPUT type="submit" class="btn" value=" 提交 ">
</FORM>
<div class="copyright">
    <a title="官方网站" href="http://www.thinkphp.cn">ThinkPHP</a>
    <span>V5</span>
    <span>{ 十年磨一剑-为API开发设计的高性能框架 }</span>
</div>
<div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
    <div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
        <div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
                        <span style="color:#000;padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer;font-weight:700">基本</span>
                        <span style="color:#000;padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer;font-weight:700">文件</span>
                        <span style="color:#000;padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer;font-weight:700">流程</span>
                        <span style="color:#000;padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer;font-weight:700">错误</span>
                        <span style="color:#000;padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer;font-weight:700">SQL</span>
                        <span style="color:#000;padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer;font-weight:700">调试</span>
                    </div>
        <div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding:0;line-height: 24px">
                        <div style="display:none;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-11-30 14:30:49 HTTP/1.1 GET : www.tp5.net/demand/1</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.037002s [ 吞吐率：27.03req/s ] 内存消耗：2,064.91kb 文件加载：52</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 0 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 1 reads,0 writes</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 65</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=do2lh59f9glmqih56im77reir0</li>                </ol>
            </div>
                        <div style="display:none;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\public\index.php ( 0.86 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\start.php ( 0.71 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\base.php ( 2.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Loader.php ( 18.26 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\composer\autoload_namespaces.php ( 0.29 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\composer\autoload_psr4.php ( 1.53 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\composer\autoload_classmap.php ( 44.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\composer\autoload_files.php ( 0.52 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\symfony\polyfill-mbstring\bootstrap.php ( 4.29 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\zircote\swagger-php\src\functions.php ( 1.65 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\topthink\think-captcha\src\helper.php ( 1.59 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Route.php ( 57.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Config.php ( 5.86 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Validate.php ( 37.25 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\vendor\topthink\think-testing\src\config.php ( 0.65 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Console.php ( 20.47 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Error.php ( 3.47 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\convention.php ( 9.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\App.php ( 19.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Request.php ( 46.23 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\config\config.php ( 10.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\config\database.php ( 2.27 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\config\extra\base.php ( 0.14 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Hook.php ( 3.72 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\config\tags.php ( 1.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\application\common.php ( 1.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Env.php ( 1.05 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\helper.php ( 16.25 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Debug.php ( 6.88 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\application\common\Hook.php ( 10.94 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\application\index\hook\Category.php ( 0.23 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\application\index\hook\User.php ( 1.03 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Model.php ( 43.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Log.php ( 5.22 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Lang.php ( 6.77 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\lang\zh-cn.php ( 3.61 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\config\route.php ( 5.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Cache.php ( 5.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\cache\driver\File.php ( 6.71 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\cache\Driver.php ( 5.25 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\application\demo\common.php ( 0.01 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\application\demo\controller\DemandVar.php ( 2.92 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Response.php ( 8.08 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\response\View.php ( 2.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\View.php ( 5.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\view\driver\Think.php ( 5.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Template.php ( 45.01 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\template\driver\File.php ( 2.17 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\runtime\temp\45d97b77ab3189185301c70ab6e17fe0.php ( 2.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Url.php ( 12.24 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Session.php ( 10.83 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\debug\Html.php ( 4.16 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">D:\phpStudy\WWW\tp5\thinkphp\library\think\Db.php ( 6.36 KB )</li>                </ol>
            </div>
                        <div style="display:none;">
                <ol style="padding: 0; margin:0">
                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ BEHAVIOR ] Run \app\common\Hook @app_init [ RunTime:0.004000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ LANG ] D:\phpStudy\WWW\tp5\thinkphp\lang\zh-cn.php</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ CACHE ] INIT File</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ ROUTE ] array (
  'type' =&gt; 'module',
  'module' =&gt; 
  array (
    0 =&gt; 'demo',
    1 =&gt; 'DemandVar',
    2 =&gt; 'index',
  ),
  'convert' =&gt; false,
)</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ HEADER ] array (
  'host' =&gt; 'www.tp5.net',
  'connection' =&gt; 'keep-alive',
  'cache-control' =&gt; 'max-age=0',
  'accept' =&gt; 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
  'upgrade-insecure-requests' =&gt; '1',
  'user-agent' =&gt; 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36',
  'accept-encoding' =&gt; 'gzip, deflate, sdch',
  'accept-language' =&gt; 'zh-CN,zh;q=0.8',
  'cookie' =&gt; 'thinkphp_show_page_trace=0|0; thinkphp_show_page_trace=0|0; PHPSESSID=do2lh59f9glmqih56im77reir0',
  'socketlog' =&gt; 'SocketLog(tabid=2&amp;client_id=luofei_zfH5NbLn)',
  'if-modified-since' =&gt; 'Wed, 30 Nov 2016 06:30:27 GMT',
)</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ PARAM ] array (
  'id' =&gt; '1',
)</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ RUN ] app\demo\controller\DemandVar-&gt;index[ D:\phpStudy\WWW\tp5\application\demo\controller\DemandVar.php ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ VIEW ] D:\phpStudy\WWW\tp5\public/../application/demo\view\demand_var\index.html [ array (
) ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ SESSION ] INIT array (
  'id' =&gt; '',
  'var_session_id' =&gt; '',
  'prefix' =&gt; 'think',
  'type' =&gt; '',
  'auto_start' =&gt; true,
)</li>                </ol>
            </div>
                        <div style="display:none;">
                <ol style="padding: 0; margin:0">
                                    </ol>
            </div>
                        <div style="display:none;">
                <ol style="padding: 0; margin:0">
                                    </ol>
            </div>
                        <div style="display:none;">
                <ol style="padding: 0; margin:0">
                                    </ol>
            </div>
                    </div>
    </div>
    <div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor:pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align:right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;">
    <div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.040003s </div>
    <img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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">
</div>

<script type="text/javascript">
    (function(){
        var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
        var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
        var open     = document.getElementById('think_page_trace_open');
        var close    = document.getElementById('think_page_trace_close').children[0];
        var trace    = document.getElementById('think_page_trace_tab');
        var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
        var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
        open.onclick = function(){
            trace.style.display = 'block';
            this.style.display = 'none';
            close.parentNode.style.display = 'block';
            history[0] = 1;
            document.cookie = 'thinkphp_show_page_trace='+history.join('|')
        }
        close.onclick = function(){
            trace.style.display = 'none';
            this.parentNode.style.display = 'none';
            open.style.display = 'block';
            history[0] = 0;
            document.cookie = 'thinkphp_show_page_trace='+history.join('|')
        }
        for(var i = 0; i < tab_tit.length; i++){
            tab_tit[i].onclick = (function(i){
                return function(){
                    for(var j = 0; j < tab_cont.length; j++){
                        tab_cont[j].style.display = 'none';
                        tab_tit[j].style.color = '#999';
                    }
                    tab_cont[i].style.display = 'block';
                    tab_tit[i].style.color = '#000';
                    history[1] = i;
                    document.cookie = 'thinkphp_show_page_trace='+history.join('|')
                }
            })(i)
        }
        parseInt(history[0]) && open.click();
        tab_tit[history[1]].click();
    })();
</script>
</body>
</html>";i:1;a:1:{s:12:"Content-Type";s:24:"text/html; charset=utf-8";}}
?>