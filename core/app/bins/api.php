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
 * ApiBin
 * 
 * Api Bin that allows generic Api access for FrameD
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package FrameD
 */


/**
 * ApiBin Class
 * 
 * @package FrameD
 * @subpackage core
 */
class ApiBin extends Bin{

/**
 * Load
 *  
 * @access public
 * @param  array  $data value
 * @return array  db rows
 */
	public function load(
						 PayloadPkg $columns,
						 PayloadPkg $order,
						 PayloadPkg $or,
						 PayloadPkg $group,
						 PayloadPkg $where,
						 PayloadPkg $whereGreater,
						 PayloadPkg $whereLess,
						 PayloadPkg $whereGreaterEq,
						 PayloadPkg $whereLessEq
						){

		
	}
}
?>
