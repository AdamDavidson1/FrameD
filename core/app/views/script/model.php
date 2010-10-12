<?php 

echo 
'<?php 
/**
 * '.$data['table'].' Model
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package '.$data['dbCfg'].'
 */

/**
 * '.$data['table'].' Structure
 */
require_once("app/models/'.$data['dbCfg'].'/structure/'.$data['tableName'].'_struct.php");

/**
 * '.$data['table'].'Model Class
 * 
 * @package '.$data['dbCfg'].'
 * @subpackage models
 */
class '.$data['table'].'Model extends '.$data['table'].'Structure {

}
?>'; 
?>
