<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsRelCategoryName extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('rel_category_name');
    $this->hasColumn('category_id', 'integer', 4, array('unsigned' => 1, 'primary' => true, 'default' => '', 'notnull' => true, 'autoincrement' => false));
    $this->hasColumn('name_id', 'integer', 4, array('unsigned' => 1, 'primary' => true, 'default' => '', 'notnull' => true, 'autoincrement' => false));
  }

  public function setUp()
  {
    parent::setUp();
  }

}
