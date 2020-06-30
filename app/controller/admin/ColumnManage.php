<?php


namespace app\controller\admin;

use app\model\admin\ColumnModel;
use app\model\admin\ColumnTemplateModel;
use Exception;
use RedBeanPHP\RedException\SQL;
use think\annotation\Route;
use think\facade\View;

/**
 * 栏目管理
 * Class ColumnManage
 * @package app\controller\admin
 */
class ColumnManage extends \app\BaseController
{
    /**
     * 栏目列表
     * @return string
     * @throws Exception
     * @Route("/")
     */
    public function index()
    {
        $list = ColumnModel::getAll();
        return View::fetch("admin/columnList", ['list' => $list]);
    }

    /**
     * @return string
     * @throws Exception
     * @Route("add")
     */
    function add()
    {
        return View::fetch("admin/columnAdd");
    }

    /**
     * 新增或者更新
     * @return mixed
     * @Route("save")
     * @throws SQL
     */
    function save()
    {
        return ColumnModel::create(request()->post());
    }

    /**
     * 删除数据
     * @Route("delete")
     */
    function delete()
    {
        return json(ColumnModel::delete(request()->post()));
    }
}