<?PHP
	require_once(dirname(__FILE__) ."/../globals.php");
	require_once(dirname(__FILE__) ."/../functions/post.php");
	
	if(isset($_POST['Submit']))
	{
		if(isset($_POST['postTitle']) && 
			isset($_POST['postAuthor']) &&
			isset($_POST['postContent']) &&
			isset($_POST['postCatID']))
		{
			doAddPost(
				filter_var(ucwords(strtolower($_POST['postTitle'])), FILTER_SANITIZE_STRING),
				filter_var(ucwords(strtolower($_POST['postAuthor'])), FILTER_SANITIZE_STRING),
				html2txt($_POST['postContent']),
				filter_var($_POST['postCatID'], FILTER_SANITIZE_STRING));
				
			header("Location: /posts.php");
		}
		else
		{
			echo "Please set a post name.";	
			require_once("/addPost.php");
		}
	}
	else
	{
		header("Location: /addPost.php");
	}
?>