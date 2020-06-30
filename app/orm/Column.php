<?php


namespace app\orm;

use Doctrine\ORM\Mapping as ORM;

/**
 *栏目条目模型
 * Class Column
 * @package app\orm
 * @ORM\Entity()
 * @ORM\Table(name="column_list")
 */
class Column
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;//ID
    /**
     * @var string
     * @ORM\Column(type="string",unique=true)
     */
    public $name;//名称
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $pic;//图片
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $type;//类型 1.文字列表 2.图文列表,3,外链列表,4.下载列表
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $intro;//简介
    /**
     * @var string
     * @ORM\Column(type="text",nullable=true)
     */
    public $content;//内容
    /**
     * @var
     * @ORM\OneToMany(targetEntity="Contents",mappedBy="column",fetch="EAGER")
     */
    public $contents;//文章列表
}