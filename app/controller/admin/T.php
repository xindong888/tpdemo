<?php


namespace app\controller\admin;


use app\BaseController;
use app\orm\Column;
use app\orm\Contents;
use app\orm\User;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use think\annotation\Route;

class T extends BaseController
{
    /**
     * @Route("/")
     */
    function index()
    {
//        使用JPA查询
        $entityManager = \Bootstrap::entityManage();
        $column = $entityManager->getRepository(Column::class)
            ->createQueryBuilder('c')
            ->select('c.name','cc')
            ->leftJoin(Contents::class, 'cc', Join::WITH, 'cc.column=c.id')
            ->getQuery()
            ->getArrayResult();
        dump($column);
        $getRepository = $entityManager->getRepository(User::class);
//        $list = $getRepository->findAll();
//        print_r($list);
//        $user = new User();
//        $user->name = '李四';
//        $user->nickname = '蝴蝶飞11';
//        $user->password = '123456';
//        $entityManager->persist($user);
//        $entityManager->flush();
//        return Db::table("column_type")->where('id', 23)->value('name');
//        JPA动态条件查询
        $w = 'findOneById';
        $user = $getRepository->$w(1);
        dump($user);
        dump($entityManager->getRepository(\app\orm\Contents::class)->find(1));//
//        dump($entityManager->getRepository(\app\orm\Content::class)->find(1));//
//        dump($user->contents[0]);
//        $content = new Content();
//        $content->name = "测试文章";
//        $content->author = "";
//        $content->audit = true;
//        $content->content = "";
//        $content->link = "";
//        $content->pic = "";
//        $content->user = $user;
//        $content->startDate = new \DateTime();
//        $content->updateDate = new \DateTime();
//        $entityManager->persist($content);
//        $entityManager->flush();
//使用dql查询
        $q = $entityManager->createQuery("SELECT cc,c.name FROM app\orm\Column c left JOIN app\orm\Contents cc with cc.column=c.id where c.id=1");
        dump($q->getArrayResult());
//查询生成器动态条件和左连接
        $qb = $entityManager->createQueryBuilder();
        $orX = $qb->expr()->orX();
        $orX->add("c.id=1");
        $column = $qb->select('cc', 'c.name')
            ->from(Column::class, 'c')
            ->add('where', $orX)
            ->leftJoin(Contents::class, 'cc', Join::WITH, 'cc.column=c.id')
            ->getQuery()
            ->getArrayResult();
        dump($column);
//使用查询生成器
        $queryBuilder = $entityManager->createQueryBuilder()
            ->from(Column::class, 'columnList')
            ->where('columnList.id=:id')
            ->setParameter('id', 1)
            ->select('columnList');
        dump($queryBuilder->getDQL());
        dump($queryBuilder->getQuery()->getArrayResult());
//使用原生sql查询 直接可以把关联的数据也查询出来
        $rsm = new ResultSetMappingBuilder($entityManager);
        $rsm->addRootEntityFromClassMetadata(User::class, 'user');
        $query = $entityManager->createNativeQuery('SELECT * FROM user', $rsm);
//        $query->setParameter(1, 1);
        $users = $query->getResult();
        dump($users);
    }

}