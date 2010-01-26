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
    *
    * @author     Jens-Andr� Koch <vain@clansuite.com>
    * @copyright  Jens-Andr� Koch (2005 - onwards)
    *
    * @link       http://www.clansuite.com
    * @link       http://gna.org/projects/clansuite
    * @since      File available since Release 0.2
    *
    * @version    SVN: $Id$
    */

// Security Handler
if (!defined('IN_CS')){die('Clansuite not loaded. Direct Access forbidden.');}

/**
 * Clansuite Module Administration - Templatemanager
 *
 * @author      Jens-Andr� Koch  <vain@clansuite.com>
 * @copyright   Jens-Andr� Koch, (2005 - onwards)
 * @since       0.2alpha
 *
 * @category    Clansuite
 * @package     Modules
 * @subpackage  Templatemanager
 */
class Module_Templatemanager_Admin extends Clansuite_ModuleController implements Clansuite_Module_Interface
{
    /**
     * Main Method of Templatemanager Module
     *
     * Sets up module specific stuff, needed by all actions of the module
     * Calls the requested Action $_REQUEST['action']
     */
    public function execute(Clansuite_HttpRequest $request, Clansuite_HttpResponse $response)
    {
        # read module config
        $this->config->readConfig( ROOT_MOD . '/templatemanager/templatemanager.config.php');
    }

    public function action_admin_show()
    {
        # Prepare the Output
        $this->prepareOutput();
    }
    
    /**
     * Show all templates for a certain module
     */
    public function action_admin_showmoduletemplates()
    {
        # get view
        $smarty = $this->getView();
         
        # Set Pagetitle and Breadcrumbs
        Clansuite_Trail::addStep( _('Editor'), '/index.php?mod=templatemanager&amp;sub=admin&amp;action=showmoduletemplates');
        
        # Incomming Variables

        # GET: tplmod (module of the template)
        if(isset($_GET['tplmod']) and (empty($_GET['tplmod']) == false) )
        {
            $tplmod = stripslashes($_GET['tplmod']);
        }
        else
        {
            $tplmod = null;
        }
        
        $smarty->assign('templateeditor_modulename',  $tplmod);
        
        #clansuite_xdebug::printR( ROOT_MOD . $tplmod . DS. 'templates' .DS . '*.tpl' );
        
        $templates = array();
        $i = 0;
        
        foreach ( glob( ROOT_MOD . $tplmod . DS. 'templates' .DS . '*.tpl' ) as $filename )
        {   
            ++$i;
            $templates[$i]['filename'] = basename($filename);
            $templates[$i]['fullpath'] = $filename;
        }    
        
        #clansuite_xdebug::printR($templates);     
        
        $smarty->assign('templates', $templates);        
        
        # Prepare the Output
        $this->prepareOutput();
    }

    /**
     * The action_admin_editor method for the Templatemanager module
     * @param void
     * @return void
     */
    public function action_admin_editor()
    {
        # get view
        $smarty = $this->getView();
         
        # Set Pagetitle and Breadcrumbs
        Clansuite_Trail::addStep( _('Editor'), '/index.php?mod=templatemanager&amp;sub=admin&amp;action=editor');
        
        # Incomming Variables

        # GET: tplmod (module of the template)
        if(isset($_GET['tplmod']) and (empty($_GET['tplmod']) == false) )
        {
            $tplmod = stripslashes($_GET['tplmod']);
            $smarty->assign('templateeditor_modulename',  $tplmod);
        }        

        # GET: tpltheme (theme of the template)
        if(isset($_GET['tpltheme']) and (empty($_GET['tpltheme']) == false) )
        {
            $tpltheme = stripslashes($_GET['tpltheme']);
            $smarty->assign('templateeditor_themename',   $tpltheme);
        }
              
        $file = '';
        
        if(isset($_GET['file']))
        {
            # append ROOT_MOD path if tplmod is set
            if(empty($tplmod) == false)
            {
                $file = ROOT_MOD . $_GET['file'];
            }
            else # it's a complete filepath
            {
                $file = $_GET['file'];
            }
            
            # DS on win is "\"
            if( DS == '\\')
            {
                # correct slashes
                $file = str_replace('/', '\\', $file);
            }        
            
            $smarty->assign('templateeditor_filename', $file);
        }
        
        # GET: file (path+templatefilename)
        /*if(empty($_GET['file']))
        {
            throw new Clansuite_Exception('No filename given. Please specify a filename for the template you want to edit.', 100);
        }*/

        # let's check, if this template exists
        if(is_file($file))
        {
            # ok, it does exist - fetch it's content
            $handle = fopen($file, 'r') or die('Unable to open the file');
            $templateText = fread($handle, filesize($file));
            fclose($handle);

            $templateeditor_newfile = false;
        } 
        else # template does not exist
        {   
            # fetch a template for rapidly setting up the new template :)
            $templateText =  $smarty->fetch('create_new_template.tpl');

            $templateeditor_newfile = true;
        }
               
        $smarty->assign('templateeditor_textarea',    htmlentities($templateText));
        $smarty->assign('templateeditor_newfile',     $templateeditor_newfile);

        # Prepare the Output
        $this->prepareOutput();
    }

    public function action_admin_save()
    {
        #Clansuite_Xdebug::printR($this->getHttpRequest());

        $tplfilename    = (string) $this->getHttpRequest()->getParameter('templateeditor_filename');
        $tplmodulename  = (string) $this->getHttpRequest()->getParameter('templateeditor_modulename');
        $tplthemename   = (string) $this->getHttpRequest()->getParameter('templateeditor_themename');
        $tpltextarea    = (string) $this->getHttpRequest()->getParameter('templateeditor_textarea');

        if(isset($tplfilename) and isset($tpltextarea))
        {
            file_put_contents($tplfilename, stripslashes($tpltextarea));
        }

        # Prepare the Output
        $this->prepareOutput();
    }
    
    public function action_admin_settings()
    {
        # Set Pagetitle and Breadcrumbs
        Clansuite_Trail::addStep( _('Editor'), '/index.php?mod=templatemanager&amp;sub=admin&amp;action=editor');

        # Prepare the Output
        $this->prepareOutput();
    }
}
?>