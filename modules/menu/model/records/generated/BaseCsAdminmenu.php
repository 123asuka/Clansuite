<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsAdminmenu extends Doctrine_Record
{
  public function setTableDefinition()
  {
    $this->setTableName('adminmenu');

    $this->hasColumn('id', 'integer', 3, array('type' => 'integer', 'length' => 3, 'unsigned' => 1, 'primary' => true));
    $this->hasColumn('parent', 'integer', 1, array('type' => 'integer', 'length' => 1, 'unsigned' => 1, 'primary' => true));
    $this->hasColumn('type', 'string', 255, array('type' => 'string', 'length' => 255, 'notnull' => true));
    $this->hasColumn('text', 'string', 255, array('type' => 'string', 'length' => 255, 'notnull' => true));
    $this->hasColumn('href', 'string', 255, array('type' => 'string', 'length' => 255, 'notnull' => true));
    $this->hasColumn('title', 'string', 255, array('type' => 'string', 'length' => 255, 'notnull' => true));
    $this->hasColumn('target', 'string', 255, array('type' => 'string', 'length' => 255, 'notnull' => true));
    $this->hasColumn('sortorder', 'integer', 3, array('type' => 'integer', 'length' => 3, 'unsigned' => 1));
    $this->hasColumn('icon', 'string', 255, array('type' => 'string', 'length' => 255, 'notnull' => true));
    $this->hasColumn('permission', 'string', 255, array('type' => 'string', 'length' => 255));
  }

  public function setUp()
  {
    parent::setUp();
  }

}