<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\phpStudy\WWW\tp5\public/../application/index\view\sess\get.html";i:1474616209;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php echo \think\Request::instance()->session('name'); ?>
</body>
</html>