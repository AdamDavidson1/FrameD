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
 * Model
 * 
 * Basic Bin for FrameD
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package FrameD
 */


/**
 * Bin Class
 * 
 * @package FrameD
 * @subpackage core
 */
abstract class Bin {

/**
 * Database Obj
 *
 * @access public
 */
   public $db;

/**
 * Config Obj
 *
 * @access public
 */
   public $config;


/**
 * Bin Construct
 * 
 * @return void
 */
   function __construct($binName, $sessionData){

	  $this->binName = $binName;
	
	  $this->config = new Config();

      $this->logger = new Logger($binName."Bin");

	  $this->sessionData = $sessionData;
   }

/**
 * SmartInsert
 *  
 * @access public
 * @param  array  $data value
 * @return int    new record ID
 */
  public function smartInsert($data){
	return $this->db->smartInsert($this->tableName, $data);
  }
 }
?>
