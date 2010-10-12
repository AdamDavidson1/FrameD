<?php 
/**
 * Example Index
 * 
 * Example action for users
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package Example
 */

/**
 * FrameD Core
 */
require_once('core/core.php');

$object = new stdClass();
$object->data = 'This is Data';

$data = array('Object' => $object, 'String' => 'This is a String', 'Integer' => 10);

$logger->debug($format);

$controller->sessionData->setPkg('time',time());
$controller->sessionData->setPkg('date',date('Y-m-d'));

//$controller->sessionData->setPkg('time',time());
//$controller->sessionData->setPkg('date',date('Y-m-d'));

$controller->setViewData(array(
								'data' => $data, 
								'CookieTime' => $controller->sessionData->getPkg('time')->getInt(),
								'Date' => $controller->sessionData->getPkg('date')->getString()
						));
$controller->render('example');
?>
