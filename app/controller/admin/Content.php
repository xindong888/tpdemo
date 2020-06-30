<?php


namespace app\controller\admin;


use app\BaseController;
use app\model\admin\ContentService;
use DateTime;
use think\annotation\Route;
use think\facade\Db;
use think\facade\View;
use think\response\Json;

/**
 * 内容控制器
 * Class Content
 * @package app\controller\admin
 */
class Content extends BaseController
{
    /**
     * 显示内容列表
     * @Route("/")
     */
    public function index()
    {
        $list = ContentService::index(request()->get('id'));//获取该分类里的所有内容
//        $column = Db::table("column_list")->where('id', request()->get('id'))->findOrEmpty();//获取该分类
        return View::fetch("admin/graphic/graphicList", [
            'list' => $list,
            'column_id' => request()->get('id')
        ]);
    }

    /**
     * 添加或保存内容的界面
     * @Route("add")
     */
    public function add()
    {
        return View::fetch("admin/graphic/graphicAdd", [
            'column_id' => request()->get('column_id')
        ]);
    }

    /**
     * 保存或更新数据
     * @return Json
     * @Route("save")
     */
    public function save()
    {
        $post = request()->post();
        if ($post['id'] !== '' && $post['id'] != null) {
            $c['id'] = $post['id'];
        }
        $c['updateDate'] = date("Y-m-d H:i:s");
        $c["name"] = $post['name'];
        $c["intro"] = $post['intro'];
        $c["content"] = $post['content'];
        $c["pic"] = $post['pic'];
        $c["source"] = $post['source'];
        $c["user_id"] = 1;
        $c["column_id"] = $post['column_id'];
        $s = Db::table("content")->save($c);
        return \json(['s' => $s, 'id' => $post['id'] === '']);
    }
}