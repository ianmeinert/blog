<ul class="username">
<?PHP 
	if(isset($_SESSION['user']))
	{
		echo "Hello " . $_SESSION['name'];
	}
?>
</ul>
<ul id="nav">
    <li><a href="/">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
</ul>
