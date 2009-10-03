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
    * @author     Jens-Andr� Koch   <vain@clansuite.com>
    * @copyright  Copyleft: All rights reserved. Jens-Andr� Koch (2005-onwards)
    *
    * @link       http://www.clansuite.com
    * @link       http://gna.org/projects/clansuite
    * @since      File available since Release 0.2
    *
    * @version    SVN: $Id: layout.core.php 2870 2009-03-25 23:21:42Z vain $
    */

// Security Handler
if (!defined('IN_CS')){ die('Clansuite not loaded. Direct Access forbidden.');}

/**
 *  Clansuite_Formelement
 *  |
 *  \- Clansuite_Formelement_Input
 *      |
 *      \- Clansuite_Formelement_Checkbox
 */
class Clansuite_Formelement_Checkbox extends Clansuite_Formelement_Input implements Clansuite_Formelement_Interface
{
    /**
     * label next to element
     *
     * @var string
     */
    protected $label;

    /**
     * constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->type = 'checkbox';
        $this->label = null;
    }

    /**
     * check or unchecks the checkbox
     *
     * @return void
     * @param bool checked
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    /**
     * sets clickable label next to element
     *
     * @return void
     * @param string $text
     */
    public function setLabel($text)
    {
        $this->label = '<label for="'.$this->id.'">'.$text.'</label>';
    }

    /**
     * sets description
     *
     * @return void
     * @param string $text
     */
    public function setDescription($text)
    {
        $this->text = $text;
    }
}
?>