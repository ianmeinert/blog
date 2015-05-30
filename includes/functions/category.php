<?PHP
	if (!defined('sitecms'))
	die('Hacking attempt...');
	
	require_once(dirname(__FILE__) ."/../connection/db.php");

	function getCategory($id)
	{
		global $link;
		
		$catId = (int)$id;
		
		$sql = "SELECT * FROM " . T_CATEGORIES . " WHERE ID = " . $catId;
		$result = mysqli_query($link, $sql);

		return mysqli_fetch_assoc($result);
	}
	
	function getCategories()
	{
		$result = getCategoryItems();
		
		if(mysqli_num_rows($result) == 0)
		{
			//let the user know there aren't any posts
			echo "<tr><td colspan='3'>No categories found</td></tr>";
		}
		else
		{
			//retrieve all the records
			while($post = mysqli_fetch_assoc($result))
			{
				echo "<tr><td>" . $post['Title'] . "</td>";
				echo "<td>" . $post['Description'] . "</td>";
				echo "<td><a href='/includes/ui/deleteCategory.php?id=" . $post['ID'] . "' onclick='return confirm_delete()'>Delete</a><br />";
				echo "<a href='editCategory.php?id=" . $post['ID'] . "'>Edit</a></td>";
				echo "</td></tr>";
			}
		}
	}
	
	function getCategoryItemsAsList($id)
	{
		$result = getCategoryItems();
		
		while($category = mysqli_fetch_assoc($result))
		{
			if($id == $category["ID"])
			{
				echo "<option selected='selected' value='" . $category["ID"] . "'>" . $category['Title'] . "</option>";
			}
			else
			{
				echo "<option value='" . $category["ID"] . "'>" . $category['Title'] . "</option>";
			}
		}
	}
	
	function getCategoryItems()
	{
		global $link;
		
		$sql = "SELECT * FROM " . T_CATEGORIES;
		$result = mysqli_query($link, $sql);
		return $result;
	}
	
	function doEditCategory($cTitle,$cDescription, $id, $cover)
	{
		global $link;
		$catId = (int) $id;
		
		$sql = "UPDATE " . T_CATEGORIES . " SET Title = '$cTitle', Description = '$cDescription', cover = $cover WHERE ID = " . $id;
		$result = mysqli_query($link, $sql);
	}
	
	function doDeleteCategory($id) 
	{
		global $link;
		$id = (int)$id;
		
		$sql = "DELETE FROM " . T_CATEGORIES . " WHERE ID = " . $id;
		$result = mysqli_query($link, $sql);
		
		header("Location: /categories.php");
	}
	
	function doAddCategory($cName,$cDescription,$cover)
	{
		global $link;
		
		$sql = "INSERT INTO " . T_CATEGORIES . " VALUES('null','$cName','$cDescription',$cover)";
		$result = mysqli_query($link, $sql);
	}
?>