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
	
	private $db;
	private $con;
	private $rs;
	
	private $ErrMsg;
	
	public function __construct() {
		$this->con = mysql_connect(DB_HOST, DB_UNAME, DB_PWD);
		$this->db = mysql_select_db(DB_DATABASE, $this->con);
	}
	
	public function __destruct() {
		mysql_close($this->con);
	}
	
	/**
	 * Execute takes an SQL SELECT statement that should return rows as its parameter
	 * and will execute the query on the server. It returns the result set as an
	 * index array of records. This method will return false on error. Check the error
	 * message with DAL::getErrorMessage()
	 * 
	 * @param string $query The query string that will be executed on the database
	 * @return array The result set as an indexed array
	 */
	public function execute($query) {
		$arResult = array();
		
		if ($this->db) {
			$this->rs = mysql_query($query, $this->con);
			if ($this->rs) {
				while ($data = mysql_fetch_assoc($this->rs)) {
					array_push($arResult, $data);
				}
				mysql_free_result($this->rs);
			} else {
				$this->ErrMsg = mysql_error();
				return false;
			}
		}
		
		return $arResult;
	}
	
	/**
	 * Update takes an SQL INSERT,UPDATE, or DELETE statement and executes it on the
	 * server. It will return the number of rows that were affected with the SQL
	 * statement. This method will return false if for some reason there are database
	 * errors. If false is returned check the error message with DAL::getErrorMessage();
	 * 
	 * @param string $update The update query to be executed on the server.
	 * @return int Rows that were affected with the update
	 */
	public function update($query) {
		$ra = 0;
		if (mysql_query($query)) {
			$ra = mysql_affected_rows();
		} else {
			$this->ErrMsg = mysql_error();
			return false;
		}
		return $ra;
	}
	
	/**
	 * This method will return an error message from the last mysql action
	 * 
	 * @return string The error message string
	 */
	public function getErrorMessage() {
		return $this->ErrMsg;
	}
}

?>