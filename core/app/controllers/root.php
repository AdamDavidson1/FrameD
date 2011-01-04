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
 * Default Root Controller
 * 
 * Default root directory actions
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package Example
 */

/**
 * RootController Class
 * 
 * @package FrameD
 * @subpackage core
 */
class RootController extends Controller {

   public function web_index(ApiBin			 $api,
							 PayloadPkg      $param,
							 PayloadStackPkg $fb_sig,
							 SessionDataPkg  $time,
							 SessionDataPkg  $newtime){

		$this->cacheControl();

		if(!$time->getInt()){
			$this->sessionData->setPkg('time',time());
		}
		if(!$newtime->getString()){
			$this->sessionData->setPkg('newtime',date('Y-m-d H:i:s'));
		}

		$params = array(
				'test' => 'More Tests', 
				'param' => $param->getString(), 
				'time' => $time->getString(), 
				'newtime' => $newtime->getString()
			);
		foreach($fb_sig->getStack() as $index => $data){
			$params[$index] = $data->getString();
		}
		$this->setViewData($params);
		$this->render('example');
   }

   public function test(PayloadPkg $param){

		$this->setViewData(array('test' => 'More Tests', 'param' => $param->getString()));
		$this->render();
   }

   public function web_more_testing(){
		$this->render('example');
   }
}
?>
