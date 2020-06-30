<?php


namespace app\orm;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class User
 * @package app\orm
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @var string
     * @ORM\Column(type="string",unique=true,length=50)
     */
    public $name;
    /**
     * @var string
     * @ORM\Column(type="string",unique=true,length=50)
     */
    public $nickname;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $password;
    /**
     * 发布的内容
     * fetch="LAZY" 懒加载  fetch="EAGER" 立即加载 fetch="EXTRA_LAZY" 额外懒加载
     * cascade={"all"} 级联方式 {"persist","remove","merge", "detach"}
     * @var array
     * @OneToMany(targetEntity="Contents", mappedBy="user",fetch="EAGER")
     */
    public $contents;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
    }


}