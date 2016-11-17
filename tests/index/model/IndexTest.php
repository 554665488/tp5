<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 16:08
 */
use tests\TestCase;

class IndexTest extends TestCase
{

    public function testSearch()
    {
        $this->seeInDatabase('user', ['id' => 2]);//该测试用例测试数据表think_user（假设你的数据表前缀设置为think_）是否存在id为2的数据。
    }

}