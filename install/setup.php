<?PHP
	require_once(dirname(__FILE__) ."/../includes/globals.php");
	require_once(dirname(__FILE__) ."/../includes/connection/db.php");

	global $link;
	
	/* check connection */
	if (mysqli_connect_errno()) {
		echo ("Connect failed: %s\n" . mysqli_connect_error());
		echo "Your database settings were not setup properly. Click <a href='/install/setup.php'>here</a> to set up your database configurations.";
		exit();
	}	
	
	if(mysqli_num_rows(mysqli_query($link,"SHOW TABLES LIKE '" . T_USERS  ."'")) == 0)
	{
		$error = "";
		$success = "";
		
		$sql = "CREATE TABLE `" . T_USERS  ."` (
				  `ID` int(11) NOT NULL auto_increment,
				  `Username` varchar(25) NOT NULL,
				  `email` varchar(100) NOT NULL,
				  `password` varchar(64) NOT NULL,
				  `Fullname` varchar(100) NOT NULL,
				  `active` int(1) NOT NULL default '0',
				  `activateKey` varchar(64) NOT NULL,
				  PRIMARY KEY  (`ID`)
				)";
			
		if(!mysqli_query($link, $sql))
		{
			$error .= "\t<p>Table creation failed: (" . mysqli_errno($link) . ") " . mysqli_error($link) . "</p>\n";
		}
		else
		{
			$success .= "\t<p>Table " . T_USERS ." successfully created</p>\n";
		}
	}
	
	if(mysqli_num_rows(mysqli_query($link,"SHOW TABLES LIKE '" . T_POSTS  ."'")) == 0)
	{
		$sql = "CREATE TABLE `" . T_POSTS  ."` (
				  `ID` int(11) NOT NULL auto_increment,
				  `Title` varchar(150) NOT NULL,
				  `Author` varchar(100) NOT NULL,
				  `Content` text NOT NULL,
				  `Category_ID` int(11) NOT NULL,
				  `date` date NOT NULL,
				  PRIMARY KEY  (`ID`)
				)";
		
		if(!mysqli_query($link, $sql))
		{
			$error .= "\t<p>Table creation failed: (" . mysqli_errno($link) . ") " . mysqli_error($link) . "</p>\n";
		}
		else
		{
			$success .= "\t<p>Table " . T_POSTS ." successfully created</p>\n";
		}
	}
	
	if(mysqli_num_rows(mysqli_query($link,"SHOW TABLES LIKE '" . T_CATEGORIES  ."'")) == 0)
	{
		$sql = "CREATE TABLE `" . T_CATEGORIES . "` (
				  `ID` int(11) NOT NULL auto_increment,
				  `Title` varchar(100) NOT NULL,
				  `Description` varchar(250) NOT NULL,
				  `cover` tinyint(1) NOT NULL,
				  PRIMARY KEY  (`ID`)
				)";
		
		if(!mysqli_query($link, $sql))
		{
			$error .= "\t<p>Table creation failed: (" . mysqli_errno($link) . ") " . mysqli_error($link) . "</p>\n";
		}
		else
		{
			$success .= "\t<p>Table " . T_CATEGORIES ." successfully created</p>\n";
		}
		
		echo $success;
		
		if($error == "")
		{
			echo "Database creation complete. Please do not forget to delete the install directory.";
		}
		else
		{
			echo $error;
		}
	}
	else
	{
		echo "Setup of the database was previously completed. Please delete the install directory.";
	}
?>