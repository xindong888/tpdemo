<?php


namespace app\orm;

use Doctrine\ORM\Mapping as ORM;

/**
 * 栏目模板类型
 * Class ColumnType
 * @package app\orm
 * @ORM\Entity()
 * @ORM\Table("column_type")
 */
class ColumnTemplate
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $name;//类型名称
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $template;//对应的模板
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $type;//模板类型 1.列表 2.详细
}