<?php
   /**
    * Koch Framework
    * Jens-Andr� Koch � 2005 - onwards
    * http://www.clansuite.com/
    *
    * This file is part of "Koch Framework".
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
    die('Koch Framework not loaded. Direct Access forbidden.');
}

namespace Koch\Formelement;

class Imagebutton extends Input implements Formelement
{
    /**
     * width of image (px)
     *
     * @var int
     */
    public $width;

    /**
     * height of image (px)
     *
     * @var int
     */
    public $height;

    /**
     * URL of image
     *
     * @var string
     */
    public $source;

    public function __construct()
    {
        $this->type = 'image';
    }

    /**
     * sets URL of image
     *
     * @param string $source
     */
    public function setImageURL($source)
    {
        $this->source = $source;
    }

    /**
     * sets width and height of image (px)
     *
     * @param int $width
     * @param int $height
     */
    public function setDimensions($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}
?>