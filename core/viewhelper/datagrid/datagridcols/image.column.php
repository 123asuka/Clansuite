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
    * @copyright  Jens-Andr� Koch (2005-onwards)
    * @link       http://www.clansuite.com
    *
    * @version    SVN: $Id$
    */

# Security Handler
if (defined('IN_CS') === false)
{
    die('Clansuite not loaded. Direct Access forbidden.');
}

/**
 * Clansuite Datagrid Column Renderer Image
 * 
 * Purpose: Render cells with Image
 */
class Clansuite_Datagrid_Column_Renderer_Image extends Clansuite_Datagrid_Column_Renderer_Base
implements Clansuite_Datagrid_Column_Renderer_Interface
{
    public $nameWrapLength  = 25;

    /**
     * Render the value(s) of a cell
     *
     * @param Clansuite_Datagrid_Cell
     * @return string Return html-code
     */
    public function renderCell($oCell)
    {
        $image_alt = $value = $oCell->getValue();

        # build an image name for the alt-tag
        if( mb_strlen($value) > $this->nameWrapLength )
        {
            $image_alt = mb_substr($value, 0, $this->nameWrapLength - 5) . 'Image';
        }

        return $this->_replacePlaceholders($value, Clansuite_HTML::img( $value, array( 'alt'  => $image_alt)));
    }
}
?>