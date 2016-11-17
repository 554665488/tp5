<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 16:03
 * 每个单元测试类必须继承TestCase类或其子类，每个单元测试方法必须以test开头。
 */
namespace tests\index;

use tests\TestCase;

class IndexTest extends TestCase
{

    /**
     * setUp方法会在每一个单元测试方法之前自动调用，所以该方法可以用于一些测试的初始化，也就是所说的基境（fixture）
     */
    public function setUp()
    {
        parent::setUp();
    }

    public function testSome()
    {
        $this->assertTrue(true);
    }
    public function testIndex()
    {
        $this->call('GET', '/');//测试用例对网站首页进行了一次GET请求，并判断是否返回正确的响应。
        $this->assertResponseOk();
    }

    /**
     * tearDown方法会在每个测试方法完成后自动调用，通常用于重置一些测试的数据。
     */
    public function tearDown()
    {
    }

}