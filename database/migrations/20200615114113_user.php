<?php

use think\migration\Migrator;
use think\migration\db\Column;

class User extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('role_user')
            ->addColumn(Column::integer('user_id')->setComment("用户ID"))
            ->addColumn(Column::integer('role_id')->setComment("角色ID"))
            ->create();

        $this->table("user")
            ->addColumn(Column::string('user_name')
                ->setUnique()
                ->setNull(false)
                ->setComment("用户名"))
            ->addColumn(Column::string('password')
                ->setNull(false)
                ->setDefault('123456')
                ->setComment('密码'))
            ->addTimestamps()
            ->create();

//        $this->table('role_user')
//            ->addForeignKey('user_id', 'user', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
//            ->update();
    }
}
