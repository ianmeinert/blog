<?PHP
	require_once(dirname(__FILE__) ."/../globals.php");
	require_once(dirname(__FILE__) ."/../functions/post.php");
	require_once(dirname(__FILE__) ."/../functions/string.php");
	
	if(isset($_POST['Submit']))
	{
		if(isset($_POST['postTitle']))
			{
				
				
				doEditPost(
					filter_var(ucwords(strtolower($_POST['postTitle'])), FILTER_SANITIZE_STRING),
					filter_var(ucwords(strtolower($_POST['postAuthor'])), FILTER_SANITIZE_STRING),
					html2txt($_POST['postContent']),
					filter_var($_POST['postCatID'], FILTER_SANITIZE_STRING),
					filter_var($_POST['postID'], FILTER_SANITIZE_STRING));
								
				header("Location: /posts.php");
			}
			else
			{
				echo "Please set a category name.";
				require_once('/editPost.php');
			}
	}
	else
	{
		header("Location: /posts.php");
	}

?>