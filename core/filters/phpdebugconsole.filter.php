<?php
   /**
    * Clansuite - just an eSports CMS
    * Jens-Andr� Koch � 2005 - onwards
    * http://www.clansuite.com/
    *
    * This file is part of "Clansuite - just an eSports CMS".
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
    * @author     Jens-Andr� Koch <vain@clansuite.com>
    * @copyright  Jens-Andr� Koch (2005 - onwards)
    * @link       http://www.clansuite.com
    *
    * @version    SVN: $Id$
    */

# Security Handler
if (defined('IN_CS') === false)
{ 
    die('Clansuite not loaded. Direct Access forbidden.' );
}

/**
 * Clansuite PHP_Debug Debugging Console
 *
 * @category    Clansuite
 * @package     Core
 * @subpackage  Filters
 * @implements  Clansuite_Filter_Interface
 */
class Clansuite_Filter_PhpDebugConsole implements Clansuite_Filter_Interface
{
    private $config     = null;

    public function __construct(Clansuite_Config $config)
    {
        $this->config    = $config;
    }

    public function executeFilter(Clansuite_HttpRequest $request, Clansuite_HttpResponse $response)
    {
        // take the initiative, if themeswitching is enabled in CONFIG
        // or pass through (do nothing)
        if(isset($this->config['error']['webdebug']) and $this->config['error']['webdebug'] == 1)
        {
            /**
             *  ================================================
             * Initialize PHP_Debug Web-Debuggign Console
             *  ================================================
             */
            if(DEBUG == true)
            {
                # Additional ini path for PHPDEBUG
                define('ADD_PHPDEBUG_ROOT', ROOT_LIBRARIES . 'phpdebug' );
                set_include_path(ADD_PHPDEBUG_ROOT . PATH_SEPARATOR. get_include_path());

                # Load Library
                if( false === class_exists('PHP_Debug',false))
                {
                    include ROOT_LIBRARIES . 'phpdebug/PHP/Debug.php';
                }

                # Setup Options for the PHPDebug Object
                $options = array(
                        # General Options
                        'render_type'          => 'HTML',    # Renderer type
                        'render_mode'          => 'div',     # Renderer mode
                        'restrict_access'      => false,     # Restrict access of debug
                        'allow_url_access'     => true,      # Allow url access
                        'url_key'              => 'key',     # Url key
                        'url_pass'             => 'nounou',  # Url pass
                        'enable_watch'         => true,      # Enable wath of vars
                        'replace_errorhandler' => true,      # Replace the php error handler
                        'lang'                 => 'EN',      # Lang

                        # Renderer specific
                        'HTML_DIV_view_source_script_name' => ROOT . 'libraries/phpdebug/PHP_Debug_ShowSource.php',
                        'HTML_DIV_images_path' =>  WWW_ROOT . 'libraries/phpdebug/images',
                        'HTML_DIV_css_path' =>  WWW_ROOT . 'libraries/phpdebug/css',
                        'HTML_DIV_js_path' =>  WWW_ROOT . 'libraries/phpdebug/js',
                        'HTML_DIV_remove_templates_pattern' => true,
                        #'HTML_DIV_templates_pattern' => array('/var/www-protected/php-debug.com' => '/var/www/php-debug')
                );

                #Clansuite_Debug::printR($options);

                # Initialiaze Object
                $debug = new PHP_Debug($options);

                # Set Title to Debug Console
                $debug->add('Clansuite DEBUG INFO');

                /**
                 *  Load JS / CSS for PHP Debug Console into the Output Buffer
                 */
                $html  = '<script type="text/javascript" src="'.$options['HTML_DIV_js_path'].'/html_div.js"></script>';
                $html .= '<link rel="stylesheet" type="text/css" media="screen" href="'.$options['HTML_DIV_css_path'].'/html_div.css" />';

                # unset $options
                unset($options);

                # combine the html output
                $debugbarHTML = $html . $debug->getOutput();

                # push output into event object
                $event = new DebugConsoleResponse_Event($debugbarHTML);

                # and output the debugging console at the end of the application runtime
                Clansuite_Eventdispatcher::instantiate()->addEventHandler('onApplicationShutdown', $event);
            }
        } // else => bypass
    }
}

/**
 * Helper Object for echoing the HTML content
 */
class DebugConsoleResponse_Event # implements Clansuite_Event_Interface

{
    public $name = 'DebugConsoleResponse';
    private $debugbarHTML;

    public function __construct($debugbarHTML)
    {
        $this->debugbarHTML = $debugbarHTML;
    }

    public function execute()
    {
        echo $this->debugbarHTML;
    }
}
?>