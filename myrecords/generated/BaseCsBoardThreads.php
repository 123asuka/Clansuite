<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsBoardThreads extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('board_threads');
    $this->hasColumn('threadid', 'integer', 4, array (
  'alltypes' => 
  array (
    0 => 'integer',
  ),
  'ntype' => 'int(11)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => true,
));
    $this->hasColumn('forumid', 'integer', 4, array (
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
  'default' => '0',
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('subject', 'string', 128, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(128)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('icon', 'string', 75, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(75)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('lastpost', 'string', 54, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(54)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('views', 'integer', 8, array (
  'alltypes' => 
  array (
    0 => 'integer',
  ),
  'ntype' => 'bigint(32)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'default' => '0',
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('replies', 'integer', 4, array (
  'alltypes' => 
  array (
    0 => 'integer',
  ),
  'ntype' => 'int(10)',
  'unsigned' => 0,
  'values' => 
  array (
  ),
  'primary' => false,
  'default' => '0',
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('author', 'string', 32, array (
  'alltypes' => 
  array (
    0 => 'string',
  ),
  'ntype' => 'varchar(32)',
  'fixed' => false,
  'values' => 
  array (
  ),
  'primary' => false,
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('closed', 'string', 15, array (
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
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('stickified', 'integer', 1, array (
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
  'default' => '0',
  'notnull' => true,
  'autoincrement' => false,
));
    $this->hasColumn('poll', 'string', null, array (
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
  }


}
?>