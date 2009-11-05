<?php
require_once('../../simpletest/autorun.php');
require_once('../classes/DAL.php');

/**
 * Unit test for the DAL
 */

class DALTest extends UnitTestCase {
	
	public $srcDAL;
	public $arResult;
	
	function testExecute() {
		$srcDAL = new DAL();
		$this->arResult = $srcDAL->execute("SELECT * FROM FAQS");
		$cnt = count($this->arResult);
		$this->assertEqual(3, $cnt);
	}
}
?>