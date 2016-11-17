<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 16:07
 */
namespace tests\index\controller;

use tests\TestCase;

class IndexTest extends TestCase
{

    public function testIndex()
    {
        $this->call('GET', '/');//测试用例对网站首页进行了一次GET请求，并判断是否返回正确的响应。
        $this->assertResponseOk();
    }

}