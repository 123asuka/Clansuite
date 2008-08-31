<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCsGroup extends Doctrine_Record
{

  public function setTableDefinition()
  {
    $this->setTableName('groups');
    $this->hasColumn('group_id', 'integer', 4, array('unsigned' => 1, 'primary' => true, 'notnull' => true, 'autoincrement' => true));
    $this->hasColumn('sortorder', 'integer', 4, array('unsigned' => 1, 'primary' => false, 'default' => '0', 'notnull' => true, 'autoincrement' => false));
    $this->hasColumn('name', 'string', 80, array('fixed' => false, 'primary' => false, 'default' => '', 'notnull' => true, 'autoincrement' => false));
    $this->hasColumn('description', 'string', 255, array('fixed' => false, 'primary' => false, 'default' => '', 'notnull' => true, 'autoincrement' => false));
    $this->hasColumn('icon', 'string', 255, array('fixed' => false, 'primary' => false, 'notnull' => false, 'autoincrement' => false));
    $this->hasColumn('image', 'string', 255, array('fixed' => false, 'primary' => false, 'notnull' => false, 'autoincrement' => false));
    $this->hasColumn('color', 'string', 7, array('fixed' => false, 'primary' => false, 'notnull' => false, 'autoincrement' => false));
  }

  public function setUp()
  {
    parent::setUp();

    $this->index('group_id', array('fields' => 'group_id'));

    $this->hasMany('CsUser', array('local' => 'group_id',  
                                    'foreign' => 'user_id',            
                                    'refClass' => 'CsRelUserGroup'));
                                    
    $this->hasMany('CsRight', array('local' => 'group_id',
                                    'foreign' => 'right_id',
                                    'refClass' => 'CsRelGroupRight'));
}
}
?>
