<?php
   /**
    * Clansuite - just an eSports CMS
    * Jens-Andr� Koch � 2005 - onwards
    * http://www.clansuite.com/
    *
    * LICENSE:
    *
    *    This program is free software; you can redistribute it and/or modify
    *    it under the terms of the GNU General Public License as published by
    *    the Free Software Foundation; either version 2 of the License, or
    *    (at your option) any later version.
    *
    *    This program is distributed in the hope that it will be useful,
    *    but WITHOUT ANY WARRANTY; without even the implied warranty of
    *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    *    GNU General Public License for more details.
    *
    *    You should have received a copy of the GNU General Public License
    *    along with this program; if not, write to the Free Software
    *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    *
    * @license    GNU/GPL v2 or (at your option) any later version, see "/doc/LICENSE".
    *
    * @author     Jens-Andr� Koch <vain@clansuite.com>
    * @copyright  Jens-Andr� Koch (2005 - onwards)
    *
    * @link       http://www.clansuite.com
    * @link       http://gna.org/projects/clansuite
    *
    * @version    SVN: $Id$
    */

# Security Handler
if(defined('IN_CS') == false)
{
    die('Clansuite not loaded. Direct Access forbidden.');
}

/**
 * Configuration Factory
 *
 * The static method getConfiguration() includes and instantiates a Configuration Engine Object
 * and injects the configfile.
 *
 * @category    Clansuite
 * @package     Core
 * @subpackage  Config
 */
class Clansuite_Config_Factory
{
    /**
     * Shortcut to @method getConfiguration() via Constructor Call
     *
     * Example Usage:
     * $config = Clansuite_Config_Factory('modulename.config.php');
     */
    function __construct($configfile)
    {
        return self::getConfiguration($configfile);
    }

    /**
     * Instantiates the correct subclass determined by the fileextension
     *
     * Possible Extensions of the Configuration Files
     *  .config.php
     *  .config.xml
     *  .config.yaml
     *
     * @param $configfile string path to configuration file
     * @return Cache Engine Object reads the configfile -> access to values via $config
     */
    public static function determineConfigurationHandlerTypeBy($configfile)
    {
        # init var
        $adapter = '';

        $extension = mb_substr($configfile, -11);

        /* if ($extension == '.config.ini.php')
         {
         * type = 'ini';
         } */

        # the fileextensions .config.php means it's an .ini file
        # the content of the file IS NOT a php-array as you might think
        if($extension == '.config.php')
        {
            $adapter = 'ini'; # @todo change this to 'php' (read/write of php-array)
        }
        elseif($extension == '.config.xml')
        {
            $adapter = 'xml';
        }
        elseif($extension == '.config.yaml')
        {
            $adapter = 'yaml';
        }
        else
        {
            exit('No handler for that type of configuration file found.');
        }

        return $adapter;
    }

    /**
     * getConfiguration
     *
     * The configuration handler type is determined automatically by configfile extension.
     * This type is used to get the right handler and return the object.
     *
     * @param $configfile Configuration file to load
     * @return Configuration Handler Object with confighandler and array of configfile.
     */
    public static function getConfiguration($configfile)
    {
        return self::getConfigurationHandler(self::determineConfigurationHandlerTypeBy($configfile), $configfile);
    }

    /**
     * getConfiguration
     *
     * @param string $adapter a configuration filename type like "php", "xml", "yaml", "ini"
     * @param string $configfile Configuration file to load. Defaults to null.
     * @return Configuration Handler Object with confighandler and array of configfile.
     */
    public static function getConfigurationHandler($adapter, $configfile = null)
    {
        # path to configuration handler classes
        $file = ROOT_CORE . 'config' . DS . mb_strtolower($adapter) . '.config.php';

        if(is_file($file) === true)
        {
            $class = 'Clansuite_Config_' . mb_strtoupper($adapter) . 'Handler';
            if(false === class_exists($class, false))
            {
                include $file;
            }

            if(class_exists($class, false))
            {
                # instantiate and return the specific confighandler with the $configfile to read
                return new $class($configfile);
            }
            else
            {
                throw new Clansuite_Exception('Config_Factory -> Class not found: ' . $class, 40);
            }
        }
        else
        {
            throw new Clansuite_Exception('Config_Factory -> File not found: ' . $class, 41);
        }
    }
}
?>