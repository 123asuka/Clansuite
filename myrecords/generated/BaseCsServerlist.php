<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsServerlist extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('cs_serverlist');
    $this->hasColumn('server_id', 'integer', 4, array (
  'alltypes' => 
  array (
    0 => 'integer',
  ),
  'ntype' => 'int(5)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
    $this->hasColumn('ip', 'string', 15, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(15)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
    $this->hasColumn('port', 'string', 5, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(5)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
    $this->hasColumn('name', 'string', 250, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(250)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
    $this->hasColumn('csquery_engine', 'string', 60, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(60)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
    $this->hasColumn('gametype', 'string', 60, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(60)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
    $this->hasColumn('image_country', 'string', 20, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(20)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => false,
  'autoincrement' => false,
));
  }


}
?>