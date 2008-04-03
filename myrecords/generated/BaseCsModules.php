<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsModules extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('cs_modules');
    $this->hasColumn('module_id', 'integer', 4, array (
  'alltypes' => 
  array (
    0 => 'integer',
  ),
  'ntype' => 'int(11)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => true,
  'notnull' => true,
  'autoincrement' => true,
));
    $this->hasColumn('name', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('author', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('homepage', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('license', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('copyright', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('title', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('description', 'string', null, array (
  'alltypes' => 
  array (
    0 => 'string',
    1 => 'clob',
  ),
  'ntype' => 'text',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('class_name', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('file_name', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('folder_name', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('enabled', 'integer', 1, array (
  'alltypes' => 
  array (
    0 => 'integer',
    1 => 'boolean',
  ),
  'ntype' => 'tinyint(1)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('image_name', 'string', 255, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(255)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('module_version', 'float', null, array (
  'alltypes' => 
  array (
    0 => 'float',
  ),
  'ntype' => 'float',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('clansuite_version', 'float', null, array (
  'alltypes' => 
  array (
    0 => 'float',
  ),
  'ntype' => 'float',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('core', 'integer', 1, array (
  'alltypes' => 
  array (
    0 => 'integer',
    1 => 'boolean',
  ),
  'ntype' => 'tinyint(4)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'default' => '0',
  'notnull' => true,
  'autoincrement' => false,
));
  }


}
?>