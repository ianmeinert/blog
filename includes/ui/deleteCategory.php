<?PHP
	require_once(dirname(__FILE__) ."/../globals.php");
	require_once(dirname(__FILE__) ."/../functions/category.php");
	doDeleteCategory($_GET['id']);
?>