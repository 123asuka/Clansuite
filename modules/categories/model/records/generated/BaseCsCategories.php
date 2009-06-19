<?php

/**
 * BaseCsCategories
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 *
 * @property integer $cat_id
 * @property integer $module_id
 * @property integer $sortorder
 * @property string  $name 
 * @property string  $description
 * @property string  $image
 * @property string  $icon
 * @property string  $color
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id$
 */
abstract class BaseCsCategories extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('categories');
        $this->hasColumn('cat_id', 'integer', 1, array('type' => 'integer', 'length' => 1, 'primary' => true, 'autoincrement' => true));
        $this->hasColumn('module_id', 'integer', 1, array('type' => 'integer', 'length' => 1));
        $this->hasColumn('sortorder', 'integer', 1, array('type' => 'integer', 'length' => 1, 'default' => '0'));
        $this->hasColumn('name', 'string', 200, array('type' => 'string', 'length' => 200, 'default' => 'New Category'));
        $this->hasColumn('description', 'string', null, array('type' => 'string'));
        $this->hasColumn('image', 'string', 60, array('type' => 'string', 'length' => 60));
        $this->hasColumn('icon', 'string', 60, array('type' => 'string', 'length' => 60));
        $this->hasColumn('color', 'string', 7, array('type' => 'string', 'length' => 7));       
    }
}
?>