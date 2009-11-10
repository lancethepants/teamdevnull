<?php
	/**
	 * The root path constant
	 */
	define("ROOT", getcwd());
	define("CLASSES", "/library/classes");
	define("CONST", "/library/const");
	
	require_once(ROOT . CONST . "/constants.php");
	require_once(ROOT . CLASSES . "/DALAbstract.php");
	require_once(ROOT . CLASSES . "/DAL.php");
?>