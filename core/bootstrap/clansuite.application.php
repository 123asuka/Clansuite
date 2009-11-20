<?php
   /**
    * Clansuite - just an eSports CMS
    * Jens-Andr� Koch � 2005 - onwards
    * http://www.clansuite.com/
    *
    *        _\|/_
    *        (o o)
    +-----oOO-{_}-OOo------------------------------------------------------------------+
    |                                                                                  |
    | LICENSE:                                                                         |
    |                                                                                  |
    |    This program is free software; you can redistribute it and/or modify          |
    |    it under the terms of the GNU General Public License as published by          |
    |    the Free Software Foundation; either version 2 of the License, or             |
    |    (at your option) any later version.                                           |
    |                                                                                  |
    |    This program is distributed in the hope that it will be useful,               |
    |    but WITHOUT ANY WARRANTY; without even the implied warranty of                |
    |    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                 |
    |    GNU General Public License for more details.                                  |
    |                                                                                  |
    |    You should have received a copy of the GNU General Public License             |
    |    along with this program; if not, write to the Free Software                   |
    |    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA    |
    |                                                                                  |
    +----------------------------------------------------------------------------------+
    *
    * @license    GNU/GPL v2 or (at your option) any later version, see "/doc/LICENSE".
    *
    * @author     Jens-Andr� Koch <vain@clansuite.com>
    * @copyright  Copyleft: All rights reserved. Jens-Andr� Koch (2005 - onwards)
    *
    * @link       http://www.clansuite.com
    * @link       http://gna.org/projects/clansuite
    * @since      File available since Release 0.2
    *
    * @version    SVN: $Id$
    */

   /** =====================================================================
    *    WARNING: DO NOT MODIFY FILES, UNLESS YOU KNOW WHAT YOU ARE DOING.
    *             READ THE DOCUMENTATION FOR INSTALLATION PROCEDURE.
    *  =====================================================================
    */

// Security Handler
if ( !defined('IN_CS') ) { die('Clansuite not loaded. Direct Access forbidden.'); }

class Clansuite_CMS
{
    # Dependency Injector Phemto
    private static $injector;

    # Configuration
    private static $config;

    private static $prefilter_classes;

    private static $postfilter_classes;

    public static function run()
    {
        define('STARTTIME', microtime(1));

        Clansuite_CMS::initialize_Config();

        Clansuite_CMS::perform_startup_checks();

        Clansuite_CMS::initialize_Paths();

        Clansuite_CMS::initialize_Debug();

        Clansuite_CMS::set_Version();

        Clansuite_CMS::initialize_Locale();

        Clansuite_CMS::initialize_Loader();

        Clansuite_CMS::initialize_Errorhandling();

        Clansuite_CMS::initialize_DependecyInjection();

        Clansuite_CMS::register_DI_Core();

        Clansuite_CMS::register_DI_Filters();

        Clansuite_CMS::start_Session();

        Clansuite_CMS::execute_Frontcontroller();

        Clansuite_CMS::shutdown_and_exit();
    }

    /**
     *  ================================================
     *     Startup Checks
     *  ================================================
     */
    private static function perform_startup_checks()
    {
        # Check if install.php is still available, so we are installed but without security steps performed
        #if ( is_file( 'installation/install.php') == true ) { header( 'Location: installation/check_security.php'); exit; }

        # PHP Version Check
        $REQUIRED_PHP_VERSION = '5.2';
        if ( version_compare(PHP_VERSION, $REQUIRED_PHP_VERSION, '<') === true )
        {
            die('Your PHP Version is <b><font color="#FF0000">' . PHP_VERSION . '</font></b>! Clansuite requires PHP Version <b><font color="#4CC417">'. $REQUIRED_PHP_VERSION .'</font></b>!');
        }
        unset($REQUIRED_PHP_VERSION);

        # PDO Check
        if ( class_exists('pdo') === false )
        {
            die('<i>php_pdo</i> not enabled!');
        }

        # PDO mysql driver Check
        # @todo the type of db-driver for pdo is set on installtion + available via config
        if ( !in_array('mysql', PDO::getAvailableDrivers()) )
        {
            die('<i>php_pdo_mysql</i> driver not enabled.');
        }

        # Data Source Name Check
        # check if database settings are available in configuration
        if(empty(self::$config['database']['type']) or
           empty(self::$config['database']['username']) or
           empty(self::$config['database']['host']) or
           empty(self::$config['database']['name'])
           )
        {
            die('<b><font color="#FF0000">[Clansuite Error] The Database Connection Data missing!</font></b> <br />
                 Please use <a href="/installation/index.php">Clansuite Installation</a> to perform a proper installation.');
        }
    }


    /**
     *  ==========================================
     *     Configuration, Initalization, Loader
     *  ==========================================
     */
    private static function initialize_Config()
    {
        # Check if clansuite.config.php is found, else we are not installed at all, so redirect to installation page
        if ( is_file('configuration/clansuite.config.php' ) == false )
        {
            header( 'Location: installation/index.php' );
            exit;
        }

        # requires configuration & gets a config to work with
        require 'core/config/ini.config.php';
        self::$config = Clansuite_Config_IniHandler::readConfig('configuration/clansuite.config.php');

        # Debug Display of Config Array
        # clansuite_xdebug::printR(self::$config);

        /**
         *  ================================================
         *     Alter php.ini settings
         *  ================================================
         */
        ini_set('short_open_tag'                , 'off');
        ini_set('arg_separator.input'           , '&amp;');
        ini_set('arg_separator.output'          , '&amp;');
        ini_set('memory_limit'                  , '30M' );
    }

    /**
     *  ================================================
     *     Define Constants
     *  ================================================
     *   - Syntax Declarations
     *   - Path Assignments
     *   - ROOT & *_ROOT
     *   - WWW_ROOT & WWW_ROOT_*
     *   - NL, CR
     *  ------------------------------------------------
     */
    private static function initialize_Paths()
    {
        /**
         * DEFINE Shorthands and Syntax Declarations
         */
        define('DS', DIRECTORY_SEPARATOR);
        define('PS', PATH_SEPARATOR);

        # HTML Break + Carriage Return
        define('NL', "<br />\r\n");
        define('CR', "\n");

        /**
         * DEFINE -> ROOT
         *
         * Purpose of ROOT is to provide the absolute path to the current working dir of clansuite
         */
        define('ROOT',  getcwd() . DS);
        #define('ROOT'       , str_replace('\\', '/', dirname(dirname(__FILE__)) ) . '/'); # Replace the DSs to Unix Style

        /**
         * DEFINE -> Directories related to ROOT
         *
         * Purpose: absolute path shortcuts
         */
        define('ROOT_MOD'           , ROOT . self::$config['paths']['mod_folder'].DS);
        define('ROOT_THEMES'        , ROOT . self::$config['paths']['themes_folder'].DS);
        define('ROOT_LANGUAGES'     , ROOT . self::$config['paths']['language_folder'].DS);
        define('ROOT_CORE'          , ROOT . self::$config['paths']['core_folder'].DS);
        define('ROOT_LIBRARIES'     , ROOT . self::$config['paths']['libraries_folder'].DS);
        define('ROOT_UPLOAD'        , ROOT . self::$config['paths']['upload_folder'].DS);
        define('ROOT_LOGS'          , ROOT . self::$config['paths']['logfiles_folder'].DS);
        define('ROOT_CACHE'         , ROOT . 'cache'.DS);
        define('ROOT_CONFIG'        , ROOT . 'configuration'.DS);

        /**
         * DEFINE -> Webpaths for Templates
         *
         * Purpose: direct usage of wwwpaths as constants in templates
         * @toto get rid of using $_SERVER, use abstraction
         */

        # 1. Determine Type of Protocol for Webpaths (http/https)
        if(isset($_SERVER['HTTPS']) and strtolower($_SERVER['HTTPS']) == 'on')
        {
            define('PROTOCOL','https://');
        }
        else
        {
            define('PROTOCOL','http://');
        }

        # 2. SERVER_URL
        define('SERVER_URL'    , PROTOCOL.$_SERVER['SERVER_NAME']);

        # 3. Build WWW_ROOT = complete www-path with server from SERVER_URL, depending on os-system
        # Purpose of WWW_ROOT is to provide the complete www-path for later use in templates
        # Example: WWW_ROOT = 'http://www.yourdomain.com/clansuite_root_directory/';
        if (dirname($_SERVER['PHP_SELF']) == "\\" )
        {
            define('WWW_ROOT', SERVER_URL );
        }
        else
        {
            define('WWW_ROOT', SERVER_URL.dirname($_SERVER['PHP_SELF']) );
        }

        # Purpose: webpath shortcuts for direct usage in templates
        define('WWW_ROOT_THEMES'       , WWW_ROOT . '/' . self::$config['paths']['themes_folder']);
        define('WWW_ROOT_THEMES_CORE'  , WWW_ROOT . '/' . self::$config['paths']['themes_folder'] .  '/core');

        /**
         * SET INCLUDE PATH -> for PEAR and other 3th party Libraries
         */
        # Note: Path order is important <first path to look>:<second path>:<etc>:
        set_include_path( ROOT_LIBRARIES . 'PEAR' . DS . PS .                   # /libraries/PEAR
                          ROOT_LIBRARIES . PS  .                                # /libraries/
                          get_include_path()                                    # attach rest
                         );
    }

    /**
     *  ================================================
     *     Debug Mode & Error Reporting Level
     *  ================================================
     *
     * Some words about the PHP Error Reporting Level.
     * The Error Reporting depends on the Debug Mode Setting.
     * When the Debug Mode is enabled Clansuite runs with error reporting set to E_ALL | E_STRICT.
     * When the Debug is disabled Clansuite will not report any errors (0).
     *
     * For security reasons you are advised to change the Debug Mode Setting to disabled when your site goes live.
     * For more info visit:  http://www.php.net/error_reporting
     * @note: in php6 e_strict will be moved into e_all
     */
    private static function initialize_Debug()
    {
        /**
         * Debug-Mode is set via config
         */
        define('DEBUG', self::$config['error']['debug']);

        /**
         * flag constant for the "output" suppresion of shutdown functions
         * functions are called, but if set "true" no output is returned
         */
        #define('SHUTDOWN_FUNCTION_SUPPRESSION', false);

        # If Debug is enabled, set FULL error_reporting, else DISABLE it completely
        if ( defined('DEBUG') and DEBUG == true ) # == true or false
        {
            ini_set('display_startup_errors', true);
            ini_set('display_errors', true);    # display errors in the browser
            error_reporting(E_ALL | E_STRICT);  # all errors and strict standard optimizations
        }
        else
        {
            ini_set('log_errors', true);        # enable error_logging
            ini_set('display_errors',   false); # do not display errors in the browser
            error_reporting(E_COMPILE_ERROR | E_RECOVERABLE_ERROR | E_ERROR | E_CORE_ERROR);
            #error_reporting(0);                 # do not report errors
            ini_set('error_log', ROOT_LOGS . 'clansuite_errorlog.txt'); # write to errorlog
        }

        /**
         * Development-Mode is set via config
         */
        define('DEVELOPMENT', self::$config['error']['development']);

        /**
         * Setup XDebug
         *
         * If Clansuite is in XDEBUG Mode an additional class is loaded, providing some
         * helper methods for profiling, tracing and enhancing the debug displays.
         * @see clansuite_xdebug:printR()
         */
        # define XDebug and set it's value via the config
        define('XDEBUG', self::$config['error']['xdebug']);

        # If XDebug is enabled, load xdebug helpers and start the debug/tracing
        if((bool)XDEBUG === true)
        {
            require 'core/bootstrap/clansuite.xdebug.php';
            clansuite_xdebug::start_xdebug();
        }
    }

    /**
     * Initialize Autoloader
     */
    private static function initialize_Loader()
    {
        # get clansuite loaders
        require 'core/bootstrap/clansuite.loader.php';
        # and register the loading handlers by overwriting the spl_autoload handling
        clansuite_loader::register_autoload();
    }

    /**
     * Initialize the custom Exception- and Errorhandlers
     */
    private static function initialize_Errorhandling()
    {
        # Set Exception Handler
        set_exception_handler(array(new Clansuite_Exception, 'clansuite_exception_handler'));

        # Set Error Handler
        new Clansuite_Errorhandler(new Clansuite_Config);
    }

    /**
     *  ============================================
     *     Dependency Injector + Register Classes
     *  ============================================
     */
    private static function initialize_DependecyInjection()
    {
        # Setup Phemto
        require ROOT_LIBRARIES.'phemto/phemto.php';
        self::$injector = new Phemto();
    }

    /**
     * Register the Clansuite Core Classes at the Dependency Injector
     */
    private static function register_DI_Core()
    {
        # define the core classes to load
        $core_classes = array(
                              'Clansuite_Config',
                              'Clansuite_HttpRequest',
                              'Clansuite_HttpResponse',
                              'Clansuite_FilterManager',
                              'Clansuite_Localization',
                              'Clansuite_Security',
                              'Clansuite_Inputfilter',
                              'Clansuite_Localization',
                              'Clansuite_User',
                             );

        # register them to the DI as singletons
        foreach( $core_classes as $class )
        {
            self::$injector->register( new Singleton( $class ) );
        }
    }

    /**
     * Register the Pre- and Postfilters Classes at the Dependency Injector
     */
    private static function register_DI_Filters()
    {
        # define prefilters to load
        self::$prefilter_classes = array(
                                         'php_debug_console', # let the debug console be first
                                         'maintenance',
                                         'get_user',
                                         'session_security',
                                         'language_via_get',
                                         'theme_via_get',
                                         'set_module_language',
                                         'set_breadcrumbs',
                                         'startup_checks',
                                         'statistics'
                                        );

        # register the prefilters at the DI
        foreach( self::$prefilter_classes as $class )
        {
            self::$injector->register( $class );
        }

        # define postfilters to load
        self::$postfilter_classes = array(
                                          #empty-at-this-time
                                          'html_tidy',
                                          'smarty_moves'
                                          );

        # register the postfilters at the DI
        foreach( self::$postfilter_classes as $class )
        {
            self::$injector->register( $class );
        }
    }

    /**
     *  ===================================================================
     *     Request & Response + Frontcontroller + Filters + processRequest
     *  ===================================================================
     */
    private static function execute_Frontcontroller()
    {
        # Get request and response objects for Filters and RequestProcessing
        $request  = self::$injector->instantiate('Clansuite_HttpRequest');
        $response = self::$injector->instantiate('Clansuite_HttpResponse');

        /**
         * Setup Frontcontroller
         *
         * pass ControllerResolvers for Module and Action with their defaults as fallback
         * start passing the dependency $injector around
         */
        $clansuite = new Clansuite_FrontController(
                         new Clansuite_ModuleController_Resolver(self::$config['defaults']['module']),
                         new Clansuite_ActionController_Resolver(self::$config['defaults']['action']),
                         self::$injector);

        /**
         * Add the Prefilters and Postfilters to the Frontcontroller
         *
         * - PRE-Filters are executed before ModuleAction is triggered
         *   Examples: caching, theme
         *
         * - POST-Filters are executed afterwards, but before view rendering
         *   Examples: output compression, character set modifications, breadcrumbs
         */
        foreach(self::$prefilter_classes as $class)
        {
            $clansuite->addPrefilter(self::$injector->instantiate($class));
        }
        foreach(self::$postfilter_classes as $class)
        {
            $clansuite->addPostfilter(self::$injector->instantiate($class));
        }

        # Take off.
        $clansuite->processRequest($request, $response);
    }

    /**
     *  ================================================
     *     Set Timezone Settings
     *  ================================================
     * with (1) ini_set()
     *      (2) date_default_timezone_set()
     *      (3) putenv(TZ=)
     *
     * PHP 5.1 strftime() and date-calculation bugfix by setting the timezone
     * For a lot more timezones look in the Appendix H of the PHP Manual
     * @link http://php.net/manual/en/timezones.php
     * @todo make $timezone configurable by user (small dropdown) or autodetected from user
     */
    private static function initialize_Locale()
    {
        # apply timezone defensivly
        if(empty(self::$config['language']['timezone']) == false)
        {
            ini_set('date.timezone', self::$config['language']['timezone']);

            if(function_exists('date_default_timezone_set'))
            {
                date_default_timezone_set(self::$config['language']['timezone']);
            }
            else
            {
                putenv('TZ=' . self::$config['language']['timezone']);
            }
        }

        if(empty(self::$config['defaults']['dateformat']) == false)
        {
            # set date formating via config
            define('DATE_FORMAT', self::$config['defaults']['dateformat']);
        }
    }

    /**
     * Starts a new Session and Userobject
     */
    private static function start_Session()
    {
        new Clansuite_Doctrine(new Clansuite_Config());

        # Initialize Session, then register the session-depending User-Object manually
        new Clansuite_Session(new Clansuite_Config, self::$injector->instantiate('Clansuite_HttpRequest'));

        # instantiate the Locale
        self::$injector->instantiate('Clansuite_Localization');

        self::$injector->instantiate('Clansuite_User');
    }

    /**
     *  ================================================
     *     Clansuite Version Information
     *  ================================================
     */
    private static function set_version()
    {
        require ROOT_CORE . 'bootstrap/clansuite.version.php';
    }

    /**
     * ==================================================
     *     Perform a proper Shutdown and Exit
     * ==================================================
     */
    public static function shutdown_and_exit()
    {
        if(DEBUG == true and defined('SHUTDOWN_FUNCTION_SUPPRESSION') and SHUTDOWN_FUNCTION_SUPPRESSION == false)
        {
            # Display the General Application Runtime
            echo 'Application Runtime: '.round(microtime(1) - constant('STARTTIME'), 3).' Seconds';
        }
    }
}
?>