<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsQuotes extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('quotes');
    $this->hasColumn('quote_id', 'tinyint', 4, array('unsigned' => 1, 'primary' => true, 'notnull' => true, 'autoincrement' => true));
    $this->hasColumn('quote_body', 'string', null, array('fixed' => false, 'primary' => false, 'default' => '', 'notnull' => true, 'autoincrement' => false));
    $this->hasColumn('quote_author', 'varchar', 255, array('fixed' => false, 'primary' => false, 'default' => '', 'notnull' => true, 'autoincrement' => false));
  }

  public function setUp()
  {
    parent::setUp();
  }

}
?>