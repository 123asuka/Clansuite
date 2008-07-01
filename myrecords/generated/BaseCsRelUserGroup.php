<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsRelUserGroup extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('rel_user_groups');
    $this->hasColumn('user_id', 'integer', 4, array('unsigned' => 1, 'primary' => true, 'default' => '0', 'notnull' => true, 'autoincrement' => false));
    $this->hasColumn('group_id', 'integer', 4, array('unsigned' => 1, 'primary' => true, 'default' => '0', 'notnull' => true, 'autoincrement' => false));
  }

  public function setUp()
  {
    parent::setUp();
  }

}
