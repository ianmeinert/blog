<?PHP include_once("functions/post.php"); ?>

<div id="sidebar">
    <div id="logo">
        <!-- Your logo goes here -->
        <a href="/"><img src="includes/images/<?php echo $site['logoImg'] ?>" alt="<?php echo $site['logoAlt'] ?>" text="<?php echo $site['logoAlt'] ?>" /></a>
    </div>

    <h4>Recent Posts</h4>
    <ul class="side-nav">
        <?PHP getTopPosts(5); ?>
    </ul>

<?php
	if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) != "register.php")
	{ ?>
    <h4>User Menu</h4>
    	<?PHP include_once("modules/login.php")?>
<?PHP } ?>
</div>
