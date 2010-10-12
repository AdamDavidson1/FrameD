<?php 
/**
 * Default Root Controller
 * 
 * Default root directory actions
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package Example
 */

class RootController extends Controller {

   public function web_index(PayloadPkg $param){
		$time_old = $this->sessionData->getPkg('time');
		$newtime = $this->sessionData->getPkg('newtime');

		$this->sessionData->setPkg('time',time());
		$this->sessionData->setPkg('newtime',date('Y-m-d H:i:s'));

		$time = $this->sessionData->getPkg('time');
		$newtime_new = $this->sessionData->getPkg('newtime');

		$this->setViewData(array(
								'test' => 'More Tests', 
								'param' => $param->getString(), 
								'time' => $time->getString(), 
								'time_old' => $time_old->getString(),
								'newtime' => $newtime->getString(),
								'newtime_new' => $newtime_new->getString()
							));
		$this->render();
   }

   public function test(PayloadPkg $param){

		$this->setViewData(array('test' => 'More Tests', 'param' => $param->getString()));
		$this->render();
   }
}
?>
