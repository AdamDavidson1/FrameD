<?php 
/*
 ______   ______     ______     __    __     ______     _____    
/\  ___\ /\  == \   /\  __ \   /\ "-./  \   /\  ___\   /\  __-.  
\ \  __\ \ \  __<   \ \  __ \  \ \ \-./\ \  \ \  __\   \ \ \/\ \ 
 \ \_\    \ \_\ \_\  \ \_\ \_\  \ \_\ \ \_\  \ \_____\  \ \____- 
  \/_/     \/_/ /_/   \/_/\/_/   \/_/  \/_/   \/_____/   \/____/ 
                                                                 

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



/**
 * Bin Loader
 * 
 * Grabs the apropriate Bin for FrameD
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package FrameD
 */


/**
 * BinLoader Class
 * 
 * @package FrameD
 * @subpackage core
 */
class BinLoader {

/**
 * BinLoader Construct
 * 
 * @return void
 */
   function __construct(){

   }
/**
 * Load
 * 
 * Makes new Selected Model Object
 *
 * @access private
 * @return obj model object 
 */
   public function load($bin, $sessionData){

	$this->logger = new Logger('ModelLoader');

	$config = new Config();

	if(is_file('app/bins/'.$bin.'_bin.php')){

		require_once('app/bins/'.$bin.'_bin.php');

	}elseif(is_file('core/app/bins/'.$bin.'_bin.php')){

		require_once('core/app/bins/'.$bin.'_bin.php');

	}else {
		$this->logger->error("Loading $bin Failed. No File Found");

		return;
	}
	$class = $bin.'Bin';

	$binObj = new $class($bin, $sessionData);

	return $binObj;
   }
}
?>
