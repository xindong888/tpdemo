<?php
// 应用公共文件

use think\facade\Db;
use think\Model;

/**
 * 数组转对象
 * @param $arr array 数组
 * @param $obj object 对象实例
 * @return object
 */
function arrToObj($arr, $obj)
{
    foreach ($arr as $key => $value) {
        $obj->$key = $value;
    }
    return $obj;
}

/**
 * 对象转数组
 * @param $obj mixed 对象实例
 * @return array
 */
function objToArr($obj)
{
    $arr = [];
    foreach ($obj as $key => $value) {
        $arr[$key] = $value;
    }
    return $arr;
}

/**
 * 把对象转换成json
 * @param $v
 * @return false|string
 */
function customJson($v)
{
    return json_encode($v);
}

/**
 * 截取文办
 * @param $str string 要截取的文本
 * @param int $length 截取的长度
 * @param string $symbol 截取后添加的符号
 * @return string
 */
function mbSubStr($str, $length = 100, $symbol = '......')
{
    $s = mb_substr($str, 0, $length, 'utf-8');
    return mb_strlen($str, 'utf8') > $length ? $s . $symbol : $s;
}

/**
 * 根据类型ID查询模板名称
 * @param $typeId
 * @return array|Model|null
 */
function getColumnType($typeId)
{
    return Db::table("column_type")->where('id', $typeId)->value('name');
}

/**
 * 通用单字段获取
 * @param $id
 * @param $table string 表格名称
 * @param $field string 字段名称
 * @return array|Model|null
 */
function getField($id, $table, $field)
{
    return Db::table($table)->where('id', $id)->value($field);
}