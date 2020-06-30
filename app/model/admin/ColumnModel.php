<?php


namespace app\model\admin;


use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Db;

/**
 * 栏目模型
 * Class ColumnModel
 * @package app\model\admin
 */
class ColumnModel
{
    public $id;//ID
    public $name;//名称
    public $pic;//图片
    public $type;//类型 1.文字列表 2.图文列表,3,外链列表,4.下载列表
    public $intro;//简介
    public $content;//内容

    /**
     *创建分类表和分类内容
     * @param $c mixed 分类的模型
     * @return int|string
     * @throws SQL
     */
    static function create($c)
    {
        $column = R::model('column_list');
        foreach ($c as $key => $value) {
            if ($key != 'none') {
                $column[$key] = $value;
            }
        }
        return R::store($column);
    }

    /**
     * 获取所有的栏目数据
     * @return string
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function getAll()
    {
        $exist = Db::query('show tables like "column_list"');
        if ($exist) {
            return Db::table('column_list')->select();
        }
        return "[]";
    }

    /**
     * 删除数据
     * @param array $arr
     * @return int
     * @throws DbException
     */
    public static function delete($arr = [])
    {
        return Db::table("column_list")->delete($arr);
    }
}