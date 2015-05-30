<?PHP 
	session_start(); 
	require_once(dirname(__FILE__) ."/includes/globals.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/blogTemplate.dwt.php" codeOutsideHTMLIsLocked="false" -->
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="This is a blog that is a work-in-progress. It is completely written by hand by me. Well, minus the jHtmlArea WYSIWYG and jQuery." />
        <meta name="Keywords" content="ian meinert, blog" />
        <link rel="stylesheet" href="includes/css/main.css" type="text/css"/>
        <link rel="Stylesheet" type="text/css" href="/includes/jHtmlArea/style/jHtmlArea.css" />

		<script type="text/javascript" src="/includes/jHtmlArea/scripts/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="/includes/jHtmlArea/scripts/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" src="/includes/jHtmlArea/scripts/jHtmlArea-0.7.5.js"></script>
		<script type="text/javascript">    
            $(function() {
                $("textarea").htmlarea(); // Initialize all TextArea's as jHtmlArea's with default values
        
                //$("#txtDefaultHtmlArea").htmlarea(); // Initialize jHtmlArea's with all default values
        
                $("#txtCustomHtmlArea").htmlarea({
                    // Override/Specify the Toolbar buttons to show
                    toolbar: [
                        ["bold", "italic", "underline", "|", "forecolor"],
                        ["p", "h1", "h2", "h3", "h4", "h5", "h6"],
                        ["link", "unlink", "|", "image"],                    
                    ]
                });
            });
        </script>
        
        <title><?PHP echo $site['title'] ?></title>
        <!-- InstanceBeginEditable name="head" -->
		<script type="text/javascript" src="/includes/js/validate.js"></script>
        <style>
		input[name="body"]
		{
			visibility:hidden;
		}
		</style>
        <!-- InstanceEndEditable -->
    </head>
    <body>
            <div id="outer-wrapper">
                <div id="inner-wrapper">
                    <div id="content-wrapper">
    
                        <!-- Begin Content -->
                        <div id="content">
        
                            <!-- Main Navigation -->
                            <?PHP include("includes/topnav.php"); ?>				
        
                            <!-- Body Content -->
                            <div id="content-inner">
                                <!-- InstanceBeginEditable name="body" -->
                                <table width="200" border="0" align="center">
                                    <form onsubmit="return validateFormOnSubmit(this)" action="/includes/ui/register.php" method="post" >
                                        <tr>
                                            <td colspan="2"><h2 style="color:#FF0000">Registration Form</h2></td>
                                        </tr>
                                        <tr>
                                            <td>Your Name:</td>
                                            <td>
                                                <input type="text" name="FullName"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>
                                                <input type="text" name="Email"/>
                                                <input type="text" name="body"/>
                                            </td>
                                        </tr>        
                                        <tr>
                                            <td>UserName:</td>
                                            <td>
                                                <input type="text" name="User" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="password" name="Password1" /></td>
                                        </tr>
                                        <tr>
                                            <td>Verify Password:</td>
                                            <td><input type="password" name="Password2" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <button type="button" name="Cancel" onClick="history.go(-1);return true;">Cancel</button>
                                                <button type="submit" name="Submit" >Submit</button>
                                            </td>
                                        </tr>
                                    </form>
                                </table>
        						<!-- InstanceEndEditable -->                                
                            </div>
                            
                        </div>
        
                        <!-- Begin Left Column -->
                        <?PHP include("includes/leftCol.php"); ?>
    
                    </div><!-- End Content-Wrapper -->
    
                    <!-- Begin Footer -->
                    <?PHP include("includes/footer.php"); ?>
                    
                </div>
            </div>
    </body>
<!-- InstanceEnd --></html>
