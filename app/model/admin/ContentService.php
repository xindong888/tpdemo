<?php


namespace app\model\admin;

use app\orm\Contents;
use think\Collection;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Db;

/**
 * 内容服务类
 * Class ContentService
 * @package app\model\admin
 */
class ContentService
{
    /**
     * 根据id获取文章
     * @param $id
     * @return Contents[]|Collection
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function index($id)
    {
        return Db::table('content')->where('column_id', $id)->select();
    }

    /**
     * 添加或保存
     * @param array|null $post
     * @return int|string
     */
    public static function save(?array $post)
    {
        $c = [];
        foreach ($post as $key => $value) {
            if ($key != 'none') {
                $c[$key] = $value;
            }
        }
        return json($c);
    }
}