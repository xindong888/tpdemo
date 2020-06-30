<?php


namespace app\orm;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * 内容管理
 * Class Content
 * @package app\orm
 * @ORM\Entity()
 * @ORM\Table(name="content")
 */
class Contents
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * 标题
     * @var string
     * @ORM\Column(type="string",unique=true)
     */
    public $name;
    /**
     * 内容
     * @var string
     * @ORM\Column(type="text",columnDefinition="longtext NOT NULL DEFAULT '' COMMENT '内容'")
     */
    public $content = '';
    /**
     * 缩略图
     * @var string
     * @ORM\Column(type="string",columnDefinition="varchar(255) NOT NULL DEFAULT '/mr.jpg' COMMENT '缩略图'")
     */
    public $pic = "/mr.jpg";
    /**
     * 链接
     * @var string
     * @ORM\Column(type="string",columnDefinition="varchar(255) NOT NULL DEFAULT '#' COMMENT '超链接'")
     */
    public $link = '#';
    /**
     * 发布者
     * @var User
     * @ManyToOne(targetEntity="User",inversedBy="contents")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;
    /**
     * 审核
     * @var boolean
     * @ORM\Column(type="boolean",columnDefinition="bool NOT NULL DEFAULT 0 COMMENT '是否审核,默认没有审核'")
     */
    public $audit = false;
    /**
     * 发布时间
     * @var DateTime
     * @ORM\Column(type="datetime",columnDefinition="datetime NOT NULL DEFAULT current_timestamp COMMENT '发布时间'")
     */
    public $startDate;
    /**
     * 修改时间
     * @var DateTime
     * @ORM\Column(type="datetime",nullable=true)
     */
    public $updateDate;
    /**
     * 栏目
     * @var Column
     * @ManyToOne(targetEntity="Column",inversedBy="contents")
     * @JoinColumn(name="column_id", referencedColumnName="id")
     */
    public $column;
    /**
     * 来源
     * @var string
     * @ORM\Column(type="string",nullable=true,columnDefinition="varchar(255) NULL COMMENT '来源'")
     */
    public $source;
    /**
     * 点击次数
     * @var integer
     * @ORM\Column(type="integer",columnDefinition="integer NOT NULL DEFAULT 0 COMMENT '点击次数'")
     */
    public $hits;
    /**
     * 摘要
     * @var string
     * @ORM\Column(type="string",columnDefinition="varchar(255) NOT NULL DEFAULT '' COMMENT '摘要'")
     */
    public $intro;
    /**
     * Content constructor.
     */
    public function __construct()
    {
        $this->startDate = new DateTime();
        $this->updateDate = new DateTime();
    }
}