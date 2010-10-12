<?php 
/**
 * Default Cli Root Controller
 * 
 * Default cli root directory actions
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package Example
 */

class CliController extends Controller {

   public function cli_build_models(
				    PayloadPkg $name,
				    PayloadPkg $core
				   ){

		$dbLoader = new DbLoader();

		if($core->getString()){
			$coreModels = 'core/';
		}else {
			$coreModels = '';
		}

		if($this->config->environment['DB'][$name->getString()]){
			$db = $dbLoader->load($name->getString());

			$db_name = $this->config->environment['DB'][$name->getString()]['db'];

			$tables = $db->getTables();

			if(!is_dir($coreModels.'app/models/'.$name->getString())){
				mkdir($coreModels.'app/models/'.$name->getString());
			}
			if(!is_dir($coreModels.'app/models/'.$name->getString().'/structure')){
				mkdir($coreModels.'app/models/'.$name->getString().'/structure');
			}

			foreach($tables as $table){
				$columns = $db->getTableData($table['Tables_in_'.$db_name]);

				$this->setReturnFormat('script');

				$this->setViewData(array('dbType'    => $this->config->environment['DB'][$name->getString()]['type'],
							 'columns'   => $columns, 
							 'dbCfg'     => $name->getString(),
							 'dbName'    => $db_name, 
							 'tableName' => $table['Tables_in_'.$db_name],
							 'table'     => $this->makeModelName($table['Tables_in_'.$db_name])));

				$model  = $this->renderReturn('model');
				$struct = $this->renderReturn('structure');

				$completed .= "Building Model: ".$table['Tables_in_'.$db_name]."\n";
				$this->logger->trace("Building Model: ".$table['Tables_in_'.$db_name]);

				if(!is_file($coreModels.'app/models/'.$name->getString().'/'.$table['Tables_in_'.$db_name].'_model.php')){
						file_put_contents($coreModels.'app/models/'.$name->getString().'/'.$table['Tables_in_'.$db_name].'_model.php', $model);
				}
				file_put_contents($coreModels.'app/models/'.$name->getString().'/structure/'.$table['Tables_in_'.$db_name].'_struct.php',$struct);
			}
		}else {
			$completed = 'Name not in config.';
		}

		$this->setViewData($completed);
		$this->render();
   }

   private function makeModelName($widget){
        $parts = explode('_',$widget);

        foreach($parts as $index => $part){
                $parts[$index] = strtoupper(substr($part,0,1)).substr($part,1);
        }

        return implode("",$parts);
  }

}
?>
