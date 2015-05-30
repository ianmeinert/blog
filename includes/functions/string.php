<?PHP
	if (!defined('sitecms'))
	die('Hacking attempt...');
	
	function left($str, $length) {
		 return substr($str, 0, $length);
	}
	
	function right($str, $length) {
		 return substr($str, -$length);
	}
	
	function html2txt($document){
		$search = array('@<script[^>]*?>.*?</script>@si');  // Strip out javascript
		$text = preg_replace($search, '', $document);
		return $text;
	} 
?>