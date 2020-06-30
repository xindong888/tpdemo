<?php
declare (strict_types=1);

namespace app\controller\admin;

use app\BaseController;
use app\model\admin\ColumnModel;
use think\annotation\Route;
use think\facade\View;
use think\Request;
use think\Response;

/**
 * 首页控制器
 * Class Index
 * @package app\controller\admin
 */
class Index extends BaseController
{
    /**
     * 我的桌面
     *
     * @return string
     * @Route("admin")
     * @throws \Exception
     */
    public function index()
    {
        $list = ColumnModel::getAll();
        return View::fetch("admin/index", ['list' => $list]);
    }

    public function welcome()
    {
        return View::fetch("admin/welcome", ['serverName' => '本地']);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        //
    }
}
