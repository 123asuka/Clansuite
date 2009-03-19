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
    * @version    SVN: $Id: index.php 2805 2009-03-08 01:40:27Z vain $
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

    function __construct()
    {

    }

    public static function run()
    {
        define('STARTTIME', microtime(1));

        Clansuite_CMS::application_startup_checks();

        Clansuite_CMS::initialize_Config();

        Clansuite_CMS::initialize_Debug();

        Clansuite_CMS::initialize_Paths();

        Clansuite_CMS::set_Version();

        Clansuite_CMS::initialize_Locale();

        Clansuite_CMS::initialize_Loader();

        Clansuite_CMS::initialize_Errorhandling();

        Clansuite_CMS::initialize_DependecyInjection();

        Clansuite_CMS::register_DI_Core();

        Clansuite_CMS::register_DI_Filters();

        Clansuite_CMS::start_Session();

        Clansuite_CMS::execute_Frontcontroller();
    }

    /**
     *  ================================================
     *     Startup Checks
     *  ================================================
     */
    private static function application_startup_checks()
    {
        # Check if clansuite.config.php is found, else we are not installed at all, so redirect to installation page
        if ( is_file('configuration/clansuite.config.php' ) == false )
        {
            header( 'Location: installation/index.php' );
            exit;
        }

        # Check if install.php is still available, so we are installed but without security steps performed
        #if ( is_file( 'installation/install.php') == true ) { header( 'Location: installation/check_security.php'); exit; }

        # PHP Version Check
        if ( version_compare(PHP_VERSION, '5.2', '<') == true )
        {
            die('Your PHP Version: <b>' . PHP_VERSION . '</b>! Clansuite requires PHP <b>' . REQUIRED_PHP_VERSION . '</b>');
        }

        # PDO Check
        if ( class_exists('pdo') === false )
        {
            die('<i>php_pdo</i> not enabled!');
        }

        # PDO mysql driver Check
        # @todo: the type of db-driver for pdo is set on installtion + available via config
        if ( !in_array('mysql', PDO::getAvailableDrivers()) )
        {
            die('<i>php_pdo_mysql</i> driver not enabled.');
        }
    }


    /**
     *  ==========================================
     *     Configuration, Initalization, Loader
     *  ==========================================
     */
    private static function initialize_Config()
    {
        # requires configuration & gets a config to work with
        require 'core/config/ini.config.php';
        self::$config = Clansuite_Config_IniHandler::readConfig('configuration/clansuite.config.php');

        # Debug Display of Config Array
        # clansuite_xdebug::printR($config);

        /**
         *  ================================================
         *     Alter php.ini settings
         *  ================================================
         */
        ini_set('short_open_tag'                , 'off');
        ini_set('arg_separator.input'           , '&amp;');
        ini_set('arg_separator.output'          , '&amp;');
        ini_set('memory_limit'                  , '20M' );
    }

    /**
     *  ================================================
     *     Define Constants
     *  ================================================
     *   - Syntax Declarations
     *   - Path Assignments
     *   - ROOT & *_ROOT
     *   - WWW_ROOT & WWW_ROOT_*
     *   - DB_PREFIX
     *   - NL, CR
     *  ------------------------------------------------
     */
    private static function initialize_Paths()
    {
        # DEFINE Shorthands and Syntax Declarations for DIRECTORY_SEPARATOR & PATH_SEPARATOR
        define('DS', DIRECTORY_SEPARATOR);
        define('PS', PATH_SEPARATOR);

        # DEFINE -> ROOT
        # Purpose of ROOT is to provide the absolute path to the current working dir of clansuite
        define('ROOT',  getcwd() . DS);
        #define('ROOT'       , str_replace('\\', '/', dirname(dirname(__FILE__)) ) . '/'); # Replace the DSs to Unix Style

        # DEFINE -> Directories related to ROOT
        # Purpose: absolute path shortcuts
        define('ROOT_MOD'           , ROOT . self::$config['paths']['mod_folder'].DS);
        define('ROOT_THEMES'        , ROOT . self::$config['paths']['themes_folder'].DS);
        define('ROOT_LANGUAGES'     , ROOT . self::$config['paths']['language_folder'].DS);
        define('ROOT_CORE'          , ROOT . self::$config['paths']['core_folder'].DS);
        define('ROOT_LIBRARIES'     , ROOT . self::$config['paths']['libraries_folder'].DS);
        define('ROOT_UPLOAD'        , ROOT . self::$config['paths']['upload_folder'].DS);
        define('ROOT_LOGS'          , ROOT . self::$config['paths']['logfiles_folder'].DS);
        define('ROOT_CONFIG'        , ROOT . 'configuration'.DS);

        # DEFINE -> Webpaths for Templates

        # @toto get rid of using $_SERVER

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

        # DEFINE -> Database Prefix
        define('DB_PREFIX'          , self::$config['database']['db_prefix']);
        # DEFINE -> HTML Break + Carriage Return
        define('NL', "<br />\r\n");
        define('CR', "\n");

        # Set Include Path for PEAR Libraries
        # Note: Path order is important <first path to look>:<second path>:<etc>:
        set_include_path( ROOT_LIBRARIES . 'PEAR' . DS . PS .                   # /libraries/PEAR
                          #$_SERVER['DOCUMENT_ROOT'].'/libraries/PEAR/' . PS .  # /libraries/PEAR
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
     * For security reasons you are advised to change the Debug Mode Setting to disabled when your site goes live.
    |* For more info visit:  http://www.php.net/error_reporting
     * @note: in php6 e_strict will be moved into e_all
     */
    private static function initialize_Debug()
    {
        # Debug-Mode is set via config
        define('DEBUG', self::$config['error']['debug']);

        # If Debug is enabled, set FULL error_reporting, else DISABLE it completely
        if ( defined('DEBUG') && DEBUG == true ) # == true or false
        {
            ini_set('display_startup_errors', true);
            ini_set('display_errors', true);    # display errors in the browser
            error_reporting(E_ALL | E_STRICT);  # all errors and strict standard optimizations
        }
        else
        {
            ini_set('display_errors',   false); # do not display errors in the browser
            error_reporting(0);                 # do not report errors
        }

        # Setup XDebug
        # XDebug is set via config
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
        # get loaders and register/overwrite spl_autoload handling
        require 'core/bootstrap/clansuite.loader.php';
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
     * Register the Core Classes at the Dependency Injector
     */
    private static function register_DI_Core()
    {
        # core classes to load
        $core_classes = array(
                              'Clansuite_Config',
                              'Clansuite_HttpRequest',
                              'Clansuite_HttpResponse',
                              'Clansuite_FilterManager',
                              'Clansuite_Doctrine',
                              'Clansuite_Localization',
                              'Clansuite_Security',
                              'Clansuite_Inputfilter',
                              'Clansuite_Statistics'
                             );

        # register to DI as singletons
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
        # prefilters to load
        self::$prefilter_classes = array(
                                         'maintenance',
                                         'get_user',
                                         'language_via_get',
                                         'theme_via_get',
                                         'set_module_language',
                                         'set_breadcrumbs',
                                         'php_debug_console',
                                         'startup_checks',
                                         'statistics'
                                        );

        # register the prefilters
        foreach( self::$prefilter_classes as $class )
        {
            self::$injector->register( $class );
        }

        # postfilters to load
        self::$postfilter_classes = array(
                                    #empty-at-this-time
                                    );

        # register the postfilters
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

        # Setup Frontcontroller and ControllerResolver; add default module and action; start passing $injector around
        $clansuite = new Clansuite_FrontController(
                         new Clansuite_ModuleController_Resolver(self::$config['defaults']['default_module']),
                         new Clansuite_ActionController_Resolver(self::$config['defaults']['default_action']),
                         self::$injector);

        /**
         * Prefilters or Postfilters
         * - PRE-Filters are executed before ModuleAction is triggered
         *   Examples: caching, theme
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

        # XDebug has the last word: Stop tracing and show debugging infos.
        if(XDEBUG)
        {
            clansuite_xdebug::end_xdebug();
        }

        # If DEBUG is on: fetch Doctrine's SQL-Profiling Report
        if(DEBUG)
        {
            self::$injector->instantiate('Clansuite_Doctrine')->displayProfilingHTML();

            echo 'Application Runtime: '.round(microtime(1) - constant('STARTTIME'), 3).' Seconds';
        }
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

    /**
     * Starts a new Session and Userobject
     *
     * @todo some position problems (locale, doctrine)
     */
    private static function start_Session()
    {
        # Connect DB, that is needed for session & user rights management
        self::$injector->instantiate('Clansuite_Doctrine');

        # instantiate the Locale
        self::$injector->instantiate('Clansuite_Localization');

        # Initialize Session, then register the session-depending User-Object manually
        Clansuite_Session::getInstance(self::$injector);
        self::$injector->register(new Singleton('Clansuite_User'));
    }

    /**
     *  ================================================
     *     Clansuite Version Information
     *  ================================================
     */
    private static function set_Version()
    {
        require ROOT_CORE . 'bootstrap/clansuite.version.php';
    }
}
?>