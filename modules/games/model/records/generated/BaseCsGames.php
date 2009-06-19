<?php

/**
 * BaseCsGames
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 *
 * @property integer $cat_id
 * @property string  $name 
 * @property string  $description
 * @property string  $image
 * @property string  $icon
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: BaseCsGames.php 3152 2009-06-18 20:56:12Z vain $
 */
abstract class BaseCsGames extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('games');
        $this->hasColumn('games_id', 'integer', 3, array('type' => 'integer', 'length' => 1, 'primary' => true, 'autoincrement' => true));
        $this->hasColumn('name', 'string', 200, array('type' => 'string', 'length' => 200, 'default' => 'New Category'));
        $this->hasColumn('description', 'string', null, array('type' => 'string'));
        $this->hasColumn('image', 'string', 60, array('type' => 'string', 'length' => 60));
        $this->hasColumn('icon', 'string', 60, array('type' => 'string', 'length' => 60));
    }
}
?>