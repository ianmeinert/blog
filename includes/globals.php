<?PHP

	/*********************************/
	/* Database definitions */
	/*********************************/

	define('DB_HOST','db448154821.db.1and1.com');
	define('DB_USER','dbo448154821');
	define('DB_PASS','IMBusyarea51');
	define('DB_NAME','db448154821');

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