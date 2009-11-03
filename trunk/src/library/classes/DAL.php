<?php 
require_once("DALAbstract.php");
/**
 * Data Access Layer class extends DALAbstract.php
 * This class is designed to access mysql db functions
 * 
 * @version 1.0
 * @author Ryan Jones
 *
 */
class DAL extends DALAbstract {
	
	public function __construct() {
		
	}
	
	/**
	 * Execute takes an SQL SELECT statement that should return rows as its parameter
	 * and will execute the query on the server. It returns the result set as an
	 * index array of records.
	 * 
	 * @param string $query The query string that will be executed on the database
	 * @return array The result set as an indexed array
	 */
	public function execute($query) {
		
	}
	
	/**
	 * Update takes an SQL INSERT,UPDATE, or DELETE statement and executes it on the
	 * server. It will return the number of rows that were affected with the SQL
	 * statement
	 * 
	 * @param string $update The update query to be executed on the server.
	 * @return int Rows that were affected with the update
	 */
	public function update($update) {
		
	}
}

?>