<?php
   /**
    * Clansuite - just an eSports CMS
    * Jens-André Koch © 2005 - onwards
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
    * @author     Jens-André Koch <vain@clansuite.com>
    * @copyright  Jens-André Koch (2005 - onwards)
    * @link       http://www.clansuite.com
    *
    * @version    SVN: $Id$
    */

//Security Handler
if(defined('IN_CS') === false)
{
    die('Clansuite not loaded. Direct Access forbidden.');
}

/**
 * Clansuite_Module_News
 *
 * @category    Clansuite
 * @package     Modules
 * @subpackage  News
 */
class Clansuite_Module_News extends Clansuite_Module_Controller
{
    /**
     * Module_News -> Execute
     */
    public function initializeModule()
    {
        # read module config
        $this->getModuleConfig();
    }

    /**
     * module news action_show()
     *
     * 1. Get news with nick of author and category
     * 2. Add general data of comments for each news
     * 3. Paginate
     *
     * @output: $news ( array for smarty template output )
     */
    public function action_show()
    {
        # Set Pagetitle and Breadcrumbs
        Clansuite_Breadcrumb::add( _('Show'), '/news/show');

        # get resultsPerPage from ModuleConfig
        $resultsPerPage = self::getConfigValue('resultsPerPage_show', '3');

        # Defining initial variables
        $currentPage = (int) $this->request->getParameterFromGet('page');
        $category    = (int) $this->request->getParameterFromGet('cat');

        # if cat is no set, we need a query to show all news regardless which category,
        if(empty($category))
        {
            $newsQuery = $this->getModel()->findAllNews($currentPage, $resultsPerPage);
        }
        else # else we need a qry with the where(cat) statement
        {
            #$newsQuery = Doctrine::getTable('CsNews')->fetchNewsByCategory($category, $currentPage, $resultsPerPage);
        }

        # import array variables into the current symbol table
        //extract($newsQuery);
        //unset($newsQuery);
        $news = $newsQuery;
        #Clansuite_Debug::printR( $news );

        # Get Render Engine
        $view = $this->getView();

        # UTF8 to HTML
        /*$nr_news = count($news);
        for($i = 0; $i < $nr_news; $i++)
        {
            $news[$i]['news_title'] = mb_convert_encoding( $news[$i]['news_title'] , 'UTF-8', 'HTML-ENTITIES');
            $news[$i]['news_body'] = mb_convert_encoding( $news[$i]['news_body'] , 'UTF-8', 'HTML-ENTITIES');
        }*/

        # Assign $news array and pager objects to smarty to Smarty for template output
        $view->assign('news', $news);
        #$view->assignGlobal('pager', $pager);
        #$view->assignGlobal('pager_layout', $pager_layout);

        $this->display();
    }

    /**
      * module news action_showone()
      *
      * Show one single news with comments
      */
     public function action_showone($params)
     {
        # Get Render Engine
        $view = $this->getView();

        #Clansuite_Debug::firebug($params);

        $news_id = (int) $params['id'];
        #(int) $this->request->getParameterFromGet('id');
        if($news_id === null) { $news_id = 1;  }

        $news = $this->getModel()->findOneNews($news_id);
        #Clansuite_Debug::printR($news);

        # if a news was found
        if(!empty($news) && is_array($news))
        {
            # Set Pagetitle and Breadcrumbs
            Clansuite_Breadcrumb::replace( _('Show News'), '/news/show', 1);
            Clansuite_Breadcrumb::add( _('Viewing Single News: ') . $news['news_title'] , '/index.php?mod=news&action=show');

            $view->assign('news', $news);
        }
        else # no news found for this id
        {
            $this->setTemplate('newsnotfound.tpl');
        }

        # Prepare Output
        $this->display();
     }

    /**
     * createFeed
     *
     * URL-Parameters: ?items=15 or 30
     */
    public function action_getfeed()
    {
        # Load Feedcreator Class
        if(false === class_exists('UniversalFeedCreator', false))
        {
            include ROOT_LIBRARIES . 'feedcreator/feedcreator.class.php';
        }

        /**
         * Get Number of Feed Items to create
         */
        $feed_items = (int) $this->request->getParameter('items');

        # Set Number of Items Range 0<15 || MAX 30
        if($feed_items == null or $feed_items < 15)
        {
            $feed_items = self::getConfigValue('feed_items', '15');
        }
        elseif($feed_items > 15 )
        {
            $feed_items = 30;
        }

        /**
         * Get Format of Feed to create
         */
        # white list for valid feed format strings
        $feed_format_array = array('RSS0.91', 'RSS1.0', 'RSS2.0', 'MBOX', 'OPML', 'ATOM', 'ATOM0.3', 'HTML', 'JS');
        # get format from request
        $feed_format = (string) $this->request->getParameter('format');
        # check its a valid string or set default
        if(in_array($feed_format, $feed_format_array) == false or $feed_format === null)
        {
            $feed_format = self::getConfigValue('feed_format', 'RSS2.0');
        }

        /**
         * Create Main Feed Object
         */
        $rss = new UniversalFeedCreator();
        $rss->useCached(); // use cached version if age<1 hour
        $rss->title = self::getConfigValue('feed_title', 'Feedname');
        $rss->description = self::getConfigValue('feed_description', 'Descriptiontext');

        # optional
        $rss->descriptionTruncSize = 500;
        $rss->descriptionHtmlSyndicated = true;

        $rss->link = "http://www.clanswebsite.net/news";
        $rss->syndicationURL = "http://www.clanwebsite.net/".$_SERVER['PHP_SELF'];

        /**
         * Create Feed Image Object
         */
        $image = new FeedImage();
        $image->title = self::getConfigValue('feed_imagetitle', 'logo');
        $image->url = self::getConfigValue('feed_image', 'http://www.clanwebsite.net/images/logo.gif');
        $image->link = self::getConfigValue('feed_imageurl', 'http://www.clanwebsite.net');
        $image->description = self::getConfigValue('feed_imagedescription', 'Feed provided by clanwebsite.net. Click to visit.');

        # optional
        $image->descriptionTruncSize = 500;
        $image->descriptionHtmlSyndicated = true;

        # Set Feed Image Object to Main Feed Object
        $rss->image = $image;

        # Fetch News via Doctrine
        $news_array = Doctrine::getTable('CsNews')->fetchNewsForFeed();

        /**
         * Loop over Dataset
         */
        foreach ($news_array as $key => $news)
        {
            /**
             * Create Feed Item Object
             */
            $item = new FeedItem();
            $item->title = $news['news_title'];
            $item->link =  WWW_ROOT . 'index.php?mod=news&action=showone&id='.$news['news_id'];
            $item->description = $news['news_body'];

            # optional
            $item->descriptionTruncSize = 500;
            $item->descriptionHtmlSyndicated = true;

            $item->date = $news['created_at'];
            $item->source = "http://www.clanwebsite.net";
            $item->author = $news['CsUsers']['nick'];

            # Set Feed Item Object to Main Feed Object
            $rss->addItem($item);
        }

        /**
         * Set Feed Format and save to file
         *
         * Valid $feed_format strings are:
         * RSS0.91, RSS1.0, RSS2.0, PIE0.1 (deprecated), MBOX, OPML, ATOM, ATOM0.3, HTML, JS
         */
        $rss->saveFeed($feed_format, ROOT_MOD . 'news/newsfeed-'.$feed_items.'.xml');
    }

    /**
     * module news action_archive()
     *
     * 1. Get news with nick of author and category
     * 2. Add general data of comments for each news
     * 3. Paginate
     * 4. news_status:
     *      1: draft
     *      2: published
     *      3: unpublished
     *      ??? 4: archive
     *
     */
    public function action_archive()
    {
        # Set Pagetitle and Breadcrumbs
        Clansuite_Breadcrumb::add( _('Archive'), '/news/archive');

        # Defining initial variables
        $currentPage = (int) $this->request->getParameter('page');
        $date        = $this->request->getParameter('date');

        # if date is an string
        if($date != null)
        {
            # check if only year is given
            if(strpos($date, '-') === false)
            {
                # convert date string like "2008"
                $startdate  = date('Y-m-d', strtotime($date . '-01-01'));
                $enddate    = date('Y-m-d', strtotime($date . '-01-01 + 1 year'));
            }
            else # the string is a year-month combination
            {
                # convert date string like "2008-Jul" to "2008-07-01"
                $startdate  = date('Y-m-d', strtotime($date));
                $enddate    = date('Y-m-d', strtotime($date . '+ 1 month'));
            }
        }
        else # set custom starting and ending date
        {
            $startdate = '1980-04-19';
            $enddate = date('Y-m-d');
        }

        # get resultsPerPage from ModuleConfig
        $resultsPerPage = self::getConfigValue('resultsPerPage_archive', '3');

        #Fetch News for Archiv with Doctrine
        $newsQuery = Doctrine::getTable('CsNews')->fetchNewsForArchiv($startdate, $enddate, $currentPage, $resultsPerPage);

        # import array variables into the current symbol table
        extract($newsQuery);
        unset($newsQuery);

        # Get Render Engine
        $view = $this->getView();

        # Assign $news array and pager objects to smarty to Smarty for template output
        $view->assign('news', $news);
        $view->assignGlobal('pager', $pager);
        $view->assignGlobal('pager_layout', $pager_layout);

        $this->display();
    }

    /**
     * module news action_fullarchive()
     *
     * 1. Get news with nick of author and category
     * 2. Add general data of comments for each news
     * 3. Paginate
     * 4. news_status:
     *      1: draft
     *      2: published
     *      3: unpublished
     *      ??? 4: archive
     *
     */
    public function action_fullarchive()
    {
        # Set Pagetitle and Breadcrumbs
        Clansuite_Breadcrumb::add( _('Archiv'), '/news/fullarchive');

        # Defining initial variables
        $currentPage = (int) $this->request->getParameter('page');

        # SmartyColumnSort -- Easy sorting of html table columns.
        include ROOT_LIBRARIES . 'smarty/libs/SmartyColumnSort.class.php';
        # A list of database columns to use in the table.
        $columns = array( 'n.created_at', 'n.news_title', 'c.cat_id', 'u.user_id', 'nr_news_comments');
        # Create the columnsort object
        $columnsort = new SmartyColumnSort($columns);
        # And set the the default sort column and order.
        $columnsort->setDefault('n.created_at', 'desc');
        # Get sort order from columnsort
        $sortorder = $columnsort->sortOrder(); # Returns 'name ASC' as default

        # set custom starting and ending date
        $startdate = '1980-04-19';
        $enddate   = date('Y-m-d');

        # get resultsPerPage from ModuleConfig
        $resultsPerPage = self::getConfigValue('resultsPerPage_fullarchive', '25');

        #Fetch News for Archiv with Doctrine
        $newsQuery = Doctrine::getTable('CsNews')->fetchNewsForFullArchiv($sortorder, $startdate, $enddate, $currentPage, $resultsPerPage);

        # import array variables into the current symbol table
        extract($newsQuery);
        unset($newsQuery);

        # Get Render Engine
        $view = $this->getView();

        # Assign $news array to Smarty for template output
        # Also pass the complete pager object to smarty (referenced to save memory - no extra vars needed) => assign()
        $view->assign('news', $news);
        $view->assignGlobal('pager', $pager);
        $view->assignGlobal('pager_layout', $pager_layout);

        $this->display();
    }

    /**
     * widget_latestnews
     *
     * Displayes the specified number of news in the latestnews_widget.tpl.
     * This is called from template-side by adding:
     * {load_module name="news" action="widget_news" items="2"}
     *
     * @param $numberNews Number of Newsitems to fetch
     * @param $smarty Smarty Render Engine Object
     * @returns content of news_widget.tpl
     */
    public function widget_latestnews($numberNews)
    {
        /**
         * get the incomming value for the number of items to display
         * we have the following order:
         * 1) specified by {load_module name="" action="" items="2"}
         *    = $numberNews incomming via parameter passed from smarty template
         * 2) modulecfg
         * 3) hardcoded defaultvalue
         */
        $numberNews = self::getConfigValue('items_newswidget', $numberNews, '8');

        $latestnews = $this->getModel()->fetchLatestNews($numberNews);

        $this->getView()->assign('widget_latestnews', $latestnews);
    }

    /**
     * Widget for displaying used NewsCategories in List-Style
     */
    public function widget_newscategories_list()
    {
        $newscategories_list = $this->getModel()->fetchUsedNewsCategories();

        $this->getView()->assign('widget_newscategories_list', $newscategories_list);
    }

    /**
     * Widget for displaying used NewsCategories in Dropdown-Style
     */
    public function widget_newscategories_dropdown()
    {
        $newscategories_dropdown = $this->getModel()->fetchUsedNewsCategories();

        $this->getView()->assign('widget_newscategories_dropdown', $newscategories_dropdown);
    }

     /**
     * Widget Archive
     */
    public function widget_archive()
    {
        # fetch all newsentries, ordered by creation date ASCENDING
        # get catdropdown options from database
        $widget_archive = $this->getModel()->fetchNewsArchiveWidget();

        # init a new array, to assign the year-month structured entries to
        $archive = array();

        # loop over all entries
        foreach($widget_archive as $entry)
        {
            # extract year and month from created_at
            $year  = date('Y',strtotime($entry['created_at']));
            $month = date('M',strtotime($entry['created_at']));

            # use extracted year and month to build up the new array
            # and reassign the entry itself
            $archive[$year][$month][] = $entry;

            #$archive['years'][$year]['months'][$month]['entries'][] = $entry;
        }

        # assign the fetched news to the view
        $this->getView()->assign('widget_archive', $archive);
    }

    /**
     * Widget Newsfeeds
     */
    public function widget_newsfeeds()
    {
        # nothing to assign, it a pure template widget
    }

    /**
     * Widget Newsfeeds
     */
    public function widget_newspublish($params)
    {

        if( is_array($params) and !empty($params))
        {
            foreach( $params as $row) {
                $p = mb_split( '=', $row );
                $parameter[$p[0]] = $p[1];
            }
        }
        $news_id = (int) $parameter['id'];

        $palign = $parameter['align'];
        switch($palign) {
            case 'left': $align = 'leftBox'; break;
            case 'right': $align = 'rightBox'; break;
            default: $align = 'rightBox'; break;
        }
        if($news_id === null  || $news_id === 0) { $news_id = 21;  }

        #Clansuite_Debug::printR($parameter);

        $news = $this->getModel('Entities\News')->findPublishNews($news_id);
        $aNews = array();
        $aNews['news_id'] = $news['news_id'];
        $aNews['news_title'] = $news['news_title'];
        $aNews['news_body'] = $news['news_body'];
        $aNews['autor'] = $news['news_authored_by']['nick'];
        $aNews['image'] = $news['category']['image'];
        #Clansuite_Debug::printR($aNews);

        $view = $this->getView();

        $view->assign('boxalign', $align);
        $view->assign('news', $aNews);
        $view->assign('publishImage', 0);

        # Prepare Output
        $this->display();
    }

}
?>