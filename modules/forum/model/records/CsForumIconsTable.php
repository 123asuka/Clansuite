<?php

/**
 * CsForumIconsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Clansuite
 * @subpackage Database
 * @author     Clansuite - just an eSports CMS <vain at clansuite dot com>
 * @version    SVN: $Id: Builder.php 4601 2010-08-28 20:41:25Z vain $
 */
class CsForumIconsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CsForumIconsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CsForumIcons');
    }
}