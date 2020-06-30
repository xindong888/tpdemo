<?php


namespace app\controller\admin;

use app\BaseController;
use app\model\admin\ColumnTemplateModel;
use RedBeanPHP\RedException\SQL;
use think\annotation\Route;
use think\db\exception\DbException;
use think\facade\View;

/**
 * 栏目模板
 * Class ColumnType
 * @package app\controller\admin
 */
class ColumnTypeTemplate extends BaseController
{
    /**
     * 获取模板列表
     * @return string
     * @throws \Exception
     * @Route("/")
     */
    public function index()
    {
        $typeName = request()->get('template');
        $list = ColumnTemplateModel::getList($typeName);
        return View::fetch("admin/columnTypeList",
            [
                'list' => $list,
                'templateName' => $typeName
            ]);
    }

    /**
     * 根据模板类型获取模板
     * @Route("getColumn")
     */
    function getColumn()
    {
        return json(ColumnTemplateModel::getColumn(request()->get("type")));
    }

    /**
     * 添加分类模板
     * @return string
     * @throws \Exception
     * @Route("getAdd")
     */
    public function getAdd()
    {
        $typeName = request()->get('template');
        return View::fetch("admin/columnTypeAdd",
            [
                'templateName' => $typeName
            ]);
    }

    /**
     * 添加\更新模板
     * @Route("save")
     * @throws SQL
     */
    public function save()
    {
        ColumnTemplateModel::create(request()->post());
    }

    /**
     * 删除记录
     * @Route("delete")
     * @throws DbException
     */
    public function delete()
    {
        return json(ColumnTemplateModel::delete(request()->post()));
    }
}