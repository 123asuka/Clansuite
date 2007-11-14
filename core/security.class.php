<?php
   /**
    * Clansuite - just an esports CMS
    * Jens-Andre Koch � 2005-2007
    * http://www.clansuite.com/
    *
    * File:         security.class.php
    * Requires:     PHP 5.2
    *
    * Purpose:      Clansuite Core Class for Security Handling
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
    * @license    GNU/GPL, see COPYING.txt
    *
    * @author     Jens-Andre Koch   <vain@clansuite.com>
    * @copyright  Jens-Andre Koch (2005-$LastChangedDate$)
    *
    * @link       http://www.clansuite.com
    * @link       http://gna.org/projects/clansuite
    * @since      File available since Release 0.2
    *
    * @version    SVN: $Id$
    */

// Security Handler
if (!defined('IN_CS')){ die('Clansuite not loaded. Direct Access forbidden.');}

/**
 * This is the Clansuite Core Class for Security Handling
 * 
 * It contains helper functions for encrypting and salting strings/passwords.
 * The file itself and all functions got rewritten entirely for Release 0.2.
 *
 * @author     Jens-Andre Koch   <vain@clansuite.com>
 * @copyright  Jens-Andre Koch (2005-$LastChangedDate$)
 * @since      Class available since Release 0.2
 *
 * @package     clansuite
 * @category    core
 * @subpackage  security
 */
class security
{
    /**
     * This functions takes a clear (password) string and prefixes a random string called 
     * "salt" to it. The new combined "salt+password" string is then passed to the hashing 
     * method to get an hash return value. 
     *
     * @param string A clear-text string, like a password "JohnDoe$123"
     * @return $hash is an array, containing ['salt'] and ['hash'] 
     */
    function build_salted_hash( $hash_algo, $string = '' )
    {
        # set up the array
        $salted_hash_array = array();
        # generate the salt with fixed length 6 and place it into the array 
        $salted_hash_array['salt'] = $this->generate_salt(6);
        # combine salt and string
        $salted_string =  $salted_hash_array['salt'] . $string
        # generate hash from "salt+string" and place it into the array
        $salted_hash_array['hash'] = $this->generate_hash($hash_algo, $salted_string);
        # return array with elements ['salt'], ['hash']
        return $salted_hash_array;
    }    
    
    /**
     * This function generates a HASH of a given string using the requested hash_algorithm.
     * When using hash() we have several hashing algorithms like: md5, sha1, sha256 etc.
     * To get a complete list of avaiable hash encodings use: print_r(hash_algos());
     * When it's not possible to use hash() for any reason, we use "md5" and "sha1".
     *
     * @param $string String to build a HASH from
     * @param $hash_type Encoding to use for the HASH (sha1, md5) default = sha1
     * @return hashed string
     * @link http://www.php.net/manual/en/ref.hash.php
     */
    function generate_hash($hash_algo = 'SHA1', $string = '')
    {
        # check, if we can use hash()
        if (function_exists('hash')) 
        {
            return hash($hash_algo,$string);
        } 
        else 
        {   # when hash() not avaiable, do hashing the old way
            switch($hash_algo)
            {
                case 'MD5':     return md5($string);
                                break;
                default:
                case 'SHA1':    return sha1($string);
                                break;
            }  
        }       
    }    
      
    /**
	 * Get random salt of size $length
 	 * mt_srand() and mt_rand() are used to generate even better 
 	 * randoms, because of mersenne-twisting.
 	 *
	 * @param integer $length Length of random string to return
	 * @return string Returns a string with random generated characters and numbers
	 */
	function generate_salt($length)
	{
	    # set salt to empty
		$salt = '';
		# seed the randoms generator with microseconds since last "whole" second
        mt_srand((double)microtime()*1000000);
		# set up the random chars to choose from
		$chars = "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        # count the number of random_chars
        $number_of_random_chars = strlen($chars);
        # add a char from the random_chars to the salt, until we got the wanted $length
        for ($i=0; $i<$length; ++$i)
		{
		    # get a random char of $chars
		    $char_to_add = $chars[mt_rand(0,$number_of_random_chars)];
		    # ensure that a random_char is not used twice in the salt
		    if(!strstr($salt, $char_to_add))
		    {
		        # finally => add char to salt
			    $salt .= $char_to_add;
		    }			    
		}
		return $salt;
	}   
}
?>