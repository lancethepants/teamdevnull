<?php 
/**
 * Abstract DAL class that the actual data layer will extend
 */
abstract class DALAbstract {
	
	abstract public function execute($query);
	
	abstract public function update($update);
	
	abstract public function connect();
	
	abstract public function selectDatabase();
}
?>