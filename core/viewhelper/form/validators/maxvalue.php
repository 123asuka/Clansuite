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
if(defined('IN_CS') === false)
{
    die('Clansuite not loaded. Direct Access forbidden.');
}

/**
 * Validates the value of an integer with maxvalue given.
 */
class Clansuite_Formelement_Validator_Maxvalue extends Clansuite_Formelement_Validator
{
    public $maxvalue;

    public function getMaxValue()
    {
        return $this->maxvalue;
    }

    /**
     * Setter for the maximum length of the string.
     *
     * @param integer $maxvalue
     */
    public function setMaxValue($maxvalue)
    {
        $this->maxvalue = (int) $maxvalue;
    }

    public function getErrorMessage()
    {
        return _('The value exceeds the maxvalue of ' . $this->getMaxValue() . ' chars.');
    }

    protected function processValidationLogic($value)
    {
        if($value > $this->getMaxValue())
        {
            return false;
        }

        return true;
    }

}

?>