<?php
	/**
	 * The root path constant
	 */
	define("ROOT", getcwd());
	define("CLASSES", "/library/classes");
	define("CONSTANTS", "/library/const");
	
	require_once(ROOT . CONSTANTS . "/constants.php");
	require_once(ROOT . CLASSES . "/DALAbstract.php");
	require_once(ROOT . CLASSES . "/DAL.php");
?>