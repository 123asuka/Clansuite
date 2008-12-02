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
    * @since      File available since Release 0.2
    *
    * @version    SVN: $Id: Cache_factory.class.php 2000 2008-05-05 19:09:46Z vain $
    */

// Security Handler
if (!defined('IN_CS')){ die('Clansuite not loaded. Direct Access forbidden.' );}

/**
 * Configuration Factory
 *
 * The static method getConfiguration() returns the appropiate configuration handler for that file
 * included and instantiated Configuration Engine Object!
 *
 * @author     Jens-Andr� Koch <vain@clansuite.com>
 * @copyright  Jens-Andr� Koch (2005 - onwards)
 *
 * @package     clansuite
 * @category    factory
 * @subpackage  configuration
 */
class Clansuite_Config_Factory
{
    /**
     * Shortcut to @method getConfiguration via Constructor Call
     *
     * Example Usage:
     * $config = Clansuite_Config_Factory('modulename.config.php');
     */
    function __construct($configfile)
    {
        self::getConfiguration(self::determineConfigurationHandlerTypeBy($configfile), $configfile);
    }

    /**
     * Instantiates the correct subclass determined by the fileextension
     *
     * Possible Extensions of the Configuration Files
     *  .config.ini
     *  .config.php
     *  .config.xml
     *  .config.yaml
     *
     * @return Cache Engine Object reads the configfile -> access to values via $config
     */
    public static function determineConfigurationHandlerTypeBy($configfile)
    {
        $extension = substr($configfile, -11);

        if ($extension == '.config.ini')
        {
            $type = 'ini';
        }
        elseif($extension == '.config.php')
        {
            $type = 'php';
        }
        elseif($extension == '.config.xml')
        {
            $type = 'xml';
        }
        elseif($extension == '.config.yaml')
        {
            $type = 'yaml';
        }
        else
        {
            exit('No handler for that type of configuration file found.');
        }

        return $type;
    }

    /**
     * getConfiguration
     *
     * @param $cache_type String (a configuration filename type like "php", "xml", "yaml", "ini")
     * @param $configfile Configfile to load
     * @static
     * @access public
     * @return Renderer Object
     */
    public static function getConfiguration($config_type, $configfile)
    {
        try
        {
			$file = ROOT_CORE .'/config/'. strtolower($config_type) .'.config.php';
        	if (is_file($file) != 0)
			{
				require_once($file);
	            $class = 'Clansuite_'. strtoupper($config_type).'Config_Handler';
	            if (class_exists($class))
	            {
	                # instantiate and return the renderer and pass $injector into
	                $config = new $class($configfile);
	                # var_dump($config);
	                return $config;
	            }
	            else
	            {
	            	 throw new ConfigFactoryClassNotFoundException($class);
	            }
	        }
			else
			{
				throw new ConfigFactoryFileNotFoundException($file);
	        }
	    }
		catch(Exception $e) {}
    }
}

/**
 * Clansuite Exception - CacheFactoryClassNotFoundException
 *
 * @package clansuite
 * @category    core
 * @subpackage exceptions
 */
class ConfigFactoryClassNotFoundException extends Exception
{
	function __construct($class)
	{
		parent::__construct();
	  	echo 'Cache_Factory -> Class not found: ' . $class;
	  	die();
	}
}

/**
 * Clansuite Exception - CacheFactoryFileNotFoundException
 *
 * @package clansuite
 * @category    core
 * @subpackage exceptions
 */
class CacheFactoryFileNotFoundException extends Exception
{
	function __construct($file)
	{
		parent::__construct();
		echo 'Cache_Factory -> File not found: ' . $file;
		die();
	}
}
}
?>