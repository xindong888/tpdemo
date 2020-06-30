<?php
namespace app\controller\home;

use app\BaseController;
use RedBeanPHP\R;
use think\annotation\Route;

class Index extends BaseController
{
    /**
     * @return string
     * @Route("/")
     */
    public function index()
    {
        return "测试下";
    }

    /**
     * @param  string $name 数据名称
     * @return mixed
     * @Route("hello/:name")
     */
    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
