<?PHP
	require_once(dirname(__FILE__) ."/../globals.php");
	require_once(dirname(__FILE__) ."/../functions/category.php");
	
	if(isset($_POST['Submit']))
	{
		if(isset($_POST['categoryTitle']))
			{
				doEditCategory(
					filter_var(ucwords(strtolower($_POST['categoryTitle'])), FILTER_SANITIZE_STRING),
					filter_var(ucfirst(strtolower($_POST['categoryDescription'])), FILTER_SANITIZE_STRING),
					filter_var($_POST['categoryID'], FILTER_SANITIZE_STRING),
					$_POST['isCoveryPage']);
								
				header("Location: /categories.php");
			}
			else
			{
				echo "Please set a category name.";
				require_once('/editCategory.php');
			}
	}
	else
	{
		header("Location: /categories.php");
	}

?>