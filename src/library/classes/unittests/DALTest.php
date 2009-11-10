<?php
require_once('../../simpletest/autorun.php');
require_once('../DAL.php');

/**
 * Unit test for the DAL
 */

print getcwd();

class DALTest extends UnitTestCase {
	
	public $srcDAL;
	public $destDAL;
	public $arResult;
	
	function testExecute() {
		$srcDAL = new DAL();
		$destDAL = new DAL();
		$this->arResult = $srcDAL->execute("SELECT * FROM FAQS");
		$arDestResult = $destDAL->execute("SELECT * FROM FAQS");
		$cnt = count($this->arResult);
		$this->assertEqual(3, $cnt);
		
		foreach ($this->arResult as $key => $array) {
			foreach ($array as $key2 => $value) {
				$this->assertEqual($value, $arDestResult[$key][$key2]);
			}
		}
	}
}
?>