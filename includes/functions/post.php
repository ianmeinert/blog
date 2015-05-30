<?PHP
	if (!defined('sitecms'))
	die('Hacking attempt...');
	
	require_once(dirname(__FILE__) ."/../connection/db.php");
	require_once(dirname(__FILE__) ."/string.php");
	
	function getPost($id)
	{
		global $link;
		$catId = (int)$id;
		
		$query = "SELECT * FROM " . T_POSTS . " WHERE ID = " . $catId;
		
		if (mysqli_real_query($link, $query)) 
		{
			if ($result = mysqli_use_result($link)) 
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					return $row;
				}
				mysqli_free_result($result);
			}
		}
	}
	
	function getPosts()
	{
		global $link;
		
		$query = "SELECT * FROM " . T_POSTS . " where Category_ID IN (SELECT ID FROM " . T_CATEGORIES . " WHERE cover = 0)  ORDER BY date DESC";

		if (mysqli_real_query( $link, $query)) 
		{
			if ($result = mysqli_use_result($link)) 
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					$ts = strtotime($row['date']);
					
					echo "\t<h2><a href=\"article.php?art=" . $row['ID'] . "\">" . $row['Title'] . "</a></h2>\n";
					echo "\t<h3>" . $row['Author'] . "</h3>\n";
					echo "\t<h3 class='authorline'>Author: " . $row['Author'] . ", " . date("F d, Y", $ts). "</h3>\n";
					echo "\t<p>" . trimPost($row['Content'],300) . "</p>\n\n";
					echo "<p class='end-story-links'><a href=\"article.php?art=" . $row['ID'] . "\">Read more...</a></p>";
				}
				mysqli_free_result($result);
			}
		}
	}	
	
	function getTopPosts($count)
	{
		global $link;
		$count = (int)$count;
		
		$query = "SELECT * FROM " . T_POSTS . " where Category_ID IN (SELECT ID FROM " . T_CATEGORIES . " WHERE cover = 0) ORDER BY date DESC LIMIT 0," . $count;
		
		if (mysqli_real_query($link, $query)) 
		{
			if ($result = mysqli_use_result($link)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<li><a href=\"article.php?art=" . $row['ID'] . "\">" . $row['Title'] . "</a></li>";
				}
				mysqli_free_result($result);
			}
		}
	}
	
	function getCoverStories()
	{	
		global $link;
		
		$query = "SELECT * FROM " . T_POSTS . " where Category_ID IN (SELECT ID FROM " . T_CATEGORIES . " WHERE cover = 1) ORDER BY date DESC LIMIT 0,5";
		
		if (mysqli_real_query( $link, $query)) 
		{
			if ($result = mysqli_use_result($link)) 
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					$ts = strtotime($row['date']);
					
					echo "\t<h2>" . $row['Title'] . "</h2>\n";
					echo "\t<h3 class='authorline'>Author: " . $row['Author'] . ", " . date("F d, Y", $ts). "</h3>\n";					
					echo "\t<p>" . trimPost($row['Content'],500) . "</p>\n\n";
					echo "<p class='end-story-links'><a href=\"article.php?art=" . $row['ID'] . "\">Read more...</a></p>";
				}
				mysqli_free_result($result);
			}
		}
	}
	
	function getAboutPage($id)
	{
		global $link;
		$catId = (int)$id;
		
		$query = "SELECT * FROM " . T_POSTS . " WHERE Category_ID = ". $catId ." ORDER BY date DESC LIMIT 1";
		
		if (mysqli_real_query( $link, $query)) 
		{
			if ($result = mysqli_use_result($link)) 
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{				
					echo "\t<h1>" . $row['Title'] . "</h1>\n";
					echo "\t<p>" . $row['Content'] . "</p>\n\n";
				}
				mysqli_free_result($result);
			}
		}
	}
	
	function managePosts()
	{
		global $link;
		
		$query = "SELECT * FROM " . T_POSTS . " ORDER BY date DESC";
		
		if (mysqli_real_query( $link, $query)) 
		{
			if ($result = mysqli_use_result($link)) {				
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row['Title'] . "</td>";
					echo "<td>" . $row['Author'] . "</td>";
					echo "<td><a href='editPost.php?id=" . $row['ID'] . "'>Edit</a> | ";
					echo "<a href='/includes/ui/deletePost.php?id=" . $row['ID'] . "' onclick='return confirm_delete()'>Delete</a></td>";
					echo "</td></tr>";
				}
				mysqli_free_result($result);
			}
			else
			{
				//let the user know there aren't any posts
				echo "<tr><td colspan='3'>No posts found</td></tr>";
			}
		}
	}
	
	function getArticle($id)
	{	
		global $link;
		$catId = (int)$id;
		
		$query = "SELECT * FROM " . T_POSTS . " WHERE ID = " . $catId;
		
		if (mysqli_real_query( $link, $query)) 
		{ 
			if ($result = mysqli_use_result($link)) 
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
					$ts = strtotime($row['date']);
					
					echo "\t<h2>" . $row['Title'] . "</h2>\n";
					echo "\t<h3 class='authorline'>Author: " . $row['Author'] . ", " . date("F d, Y", $ts). "</h3>\n";
					echo "\t<p>" . $row['Content'] . "</p>\n\n";
				}
				mysqli_free_result($result);
			}
		} 
	}
	
	function doAddPost($pTitle,$pAuthor,$pContent,$cID)
	{
		global $link;
		$catID = (int)$cID;
		
		$sql = "INSERT INTO " . T_POSTS . " VALUES('null','$pTitle','$pAuthor','$pContent',$catID, CURDATE())";
		$result = mysqli_query($link, $sql);
	}
	
	function doEditPost($pTitle,$pAuthor,$pContent,$cID, $pID)
	{
		global $link;
		$catId = (int) $cID;
		$postId = (int) $pID;
		
		$sql = "UPDATE " . T_POSTS . " SET Title = '$pTitle', Author = '$pAuthor', Content = '$pContent', Category_ID = $catId WHERE ID = " . $postId;
		$result = mysqli_query($link, $sql);
	}

	function doDeletePost($id) 
	{
		global $link;
		$id = (int)$id;
		
		$sql = "DELETE FROM " . T_POSTS . " WHERE ID = " . $id;
		mysqli_query($link, $sql);
		
		header("Location: /posts.php");
	}
	
	function trimPost($string, $length)
	{
		if(strlen($string) > $length)
		{
			return left($string,$length) . "...";
		}
		else
		{
			return $string;	
		}
		 
	}
?>