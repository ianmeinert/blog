<?PHP

	/*********************************/
	/* Database definitions */
	/*********************************/

	define('DB_HOST','');
	define('DB_USER','');
	define('DB_PASS','');
	define('DB_NAME','');

	/*********************************/
	/* Website global variables */
	/*********************************/
	
	$site['title'] = "Ian's Test Blog";
	$site['logoAlt'] = "AFK Getting some beer";
	$site['logoImg'] = "logo.png";
	
	/*********************************/
	/* Do Not Modify below this line */
	/*********************************/
	
	define('sitecms', 1);
	define('T_PREFIX','cms_');
	define('T_POSTS',T_PREFIX . 'posts');
	define('T_USERS',T_PREFIX . 'users');
	define('T_CATEGORIES',T_PREFIX . 'categories');
?>
