<?php

/**
 * CsUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Clansuite
 * @subpackage Database
 * @author     Clansuite - just an eSports CMS <vain at clansuite dot com>
 * @version    SVN: $Id: Builder.php 4601 2010-08-28 20:41:25Z vain $
 */
class CsUsers extends BaseCsUsers
{
    /**
      * Returns an user in array form by ID
      *
      * @param   integer $id
      * @return  array
      */
    public static function getUser($id)
    {
        $user_array =  Doctrine_Query::create()
                        ->from('CsUsers u')
                        ->leftJoin('u.CsGroups g INDEXBY g.id')
                        ->where('u.id = ?', $id)
                        ->execute( array(), Doctrine::HYDRATE_ARRAY);

        #Clansuite_Logger::log('Doctrine Query '.__METHOD__.' '.var_export($user_array,true));

        return $user_array;
    }

    /**
      * Returns an user in array form by EMAIL
      *
      * @param   string $email
      * @return  array
      */
    public static function getUserByEmail($email)
    {
        $user_array = Doctrine_Query::create()
                       ->from('CsUsers u')
                       ->leftJoin('u.CsGroups g INDEXBY g.id')
                       ->where('u.email = ?', $email)
                       ->execute( array(), Doctrine::HYDRATE_ARRAY);

        #Clansuite_Logger::log('Doctrine Query '.__METHOD__.' '.var_export($user_array,true));

        return $user_array;
    }

    /**
     * Returns an user in array form by NICKNAME
     *
     * @param   string $nickname
     * @return  array
     */
    public static function getUserByNick($nick)
    {

        $user_array = Doctrine_Query::create()
                       ->from('CsUsers u')
                       ->leftJoin('u.CsGroups g INDEXBY g.id')
                       ->where('u.nick = ?', $nick)
                       ->execute( array(), Doctrine::HYDRATE_ARRAY);

        #Clansuite_Logger::log('Doctrine Query '.__METHOD__.' '.var_export($user_array,true));

        return $user_array;
    }

}