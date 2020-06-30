<?php


namespace app\model\admin;

use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;
use think\Collection;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Db;

/**
 *栏目类型的模型
 * Class ColumnTypeModel
 * @package app\model\admin
 */
class ColumnTemplateModel
{
    /**
     *创建分类表和分类内容
     * @param $c mixed 分类的模型
     * @throws SQL
     */
    static function create($c)
    {
        $column = R::model('column_type');
        foreach ($c as $key => $value) {
            $column[$key] = $value;
        }
        R::store($column);
    }

    /**
     * 获取数据列表
     * @param $type
     * @return string
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function getList($type)
    {
        $exist = Db::query('show tables like "column_type"');
        if ($exist) {
            return Db::table('column_type')
                ->where('type', $type)
                ->order('id', 'asc')
                ->select();
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
        return Db::table("column_type")->delete($arr);
    }

    /**
     * 获取不同类型的模板
     * @param string $get
     * @return Collection
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public static function getColumn($get = 'all')
    {
        if(is_null($get)){
            return Db::table("column_type")->select();
        }
        return Db::table("column_type")->where("type", $get)->select();
    }
}