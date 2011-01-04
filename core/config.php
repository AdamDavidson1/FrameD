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
 * Config
 * 
 * Config options loader for FrameD
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package FrameD
 */


/**
 * Config Class
 * 
 * @package FrameD
 * @subpackage core
 */
final class Config{

   public $environment;

   public $application;

   private $declared;

   function __construct(){
		$this->declared = false;

		$default_environment = $this->parseIni('config/default_environment.ini');
		$default_application = $this->parseIni('config/default_application.ini');

		$this->environment = array_merge($this->parseIni('config/environment.ini', $default_environment);
		$this->application = array_merge($this->parseIni('config/application.ini'), $default_application);
   }

   private function parseIni($array){
	$conf = array();

        $conf = $this->getArr($array);

	return $conf;
   }
 
   /** 
    * Loads configuration from the configuration file  
    * and returns the associative array 
    * 
    * @param string $path     - path to the configuration file 
    * @param string $sep_k    - key separator string 
    * @param string $sep_v    - value separator string 
    * @return array        - parsed configuration 
    */ 
 
   private function getArr($path, $sep_k='.', $sep_v=',') { 
     
       $out=array(); 
       $conf=parse_ini_file($path,true); 
       foreach($conf as $k=>$v) { 
	       $out[$k]=array(); 
	       foreach($v as $key=>$val) { 
	 	   $keys=explode($sep_k,$key); 
		       $link=&$out[$k]; 
		   foreach($keys as $key_sep) {     
		       $link=&$link[$key_sep]; 
		   }     
		   if(preg_match('/,/',$val)) { 
		       $values=explode($sep_v,$val); 
		       $link=$values; 
		   } else { 
		       $link=$val; 
		   } 
	       } 
     
       } 
     
       return $out; 
 
   } 
}
?>
