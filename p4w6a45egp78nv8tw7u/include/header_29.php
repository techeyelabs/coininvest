<?php
function CreateOption($cboname,$curid,$tablename) {

		echo '<select name=cbo'.ucwords($cboname).' class=cbobig>';
		echo '<option value="">Select</option>';
			$optSql="select * from $tablename";
			$optResult=mysql_query($optSql);
			while($optRow=mysql_fetch_array($optResult)) {
				
					if($optRow[0]==$curid)
					echo '<option value='.$optRow[0].'  selected="selected">'.$optRow[1].'</option>';
					else
					echo '<option value='.$optRow[0].'>'.$optRow[1].'</option>';
				
			}
			echo '</select>';
	}
	
	$permission=explode(",",$_SESSION['permission']);
?>

<!DOCTYPE html> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administrator Control Panel</title>

	<link type="text/css" href="style.css" rel="stylesheet" /> <!-- the layout css file -->
	<link type="text/css" href="css/jquery.cleditor.css" rel="stylesheet" />
	
	<script type='text/javascript' src='js/jquery-1.4.2.min.js'></script>	<!-- jquery library -->
	<script type='text/javascript' src='js/jquery-ui-1.8.5.custom.min.js'></script> <!-- jquery UI -->
	<script type='text/javascript' src='js/cufon-yui.js'></script> <!-- Cufon font replacement -->
	<script type='text/javascript' src='js/ColaborateLight_400.font.js'></script> <!-- the Colaborate Light font -->
	<script type='text/javascript' src='js/easyTooltip.js'></script> <!-- element tooltips -->
	<script type='text/javascript' src='js/jquery.tablesorter.min.js'></script> <!-- tablesorter -->
	
	<!--[if IE 8]>
		<script type='text/javascript' src='js/excanvas.js'></script>
		<link rel="stylesheet" href="css/IEfix.css" type="text/css" media="screen" />
	<![endif]--> 
 
	<!--[if IE 7]>
		<script type='text/javascript' src='js/excanvas.js'></script>
		<link rel="stylesheet" href="css/IEfix.css" type="text/css" media="screen" />
	<![endif]--> 
	
	<script type='text/javascript' src='js/visualize.jQuery.js'></script> <!-- visualize plugin for graphs / statistics -->
	<script type='text/javascript' src='js/iphone-style-checkboxes.js'></script> <!-- iphone like checkboxes -->
	<script type='text/javascript' src='js/jquery.cleditor.min.js'></script> <!-- wysiwyg editor -->

	<script type='text/javascript' src='js/custom.js'></script> <!-- the "make them work" script -->
</head>

<body>

	<div id="container">
		<div id="bgwrap">
			<div id="primary_left">
        
				<div id="logo" style="padding-left:10px">
					<a href="home.php"><img height="82" width="195" src="assets/logo/images.jpeg" alt="Company Logo"></a>
                    				</div> <!-- logo end -->
<?php
		$file = $_SERVER["SCRIPT_NAME"];
		$break = explode('/', $file);
		$pfile = $break[count($break) - 1];

?>
				<div id="menu"> <!-- navigation menu -->
					<ul>
						<li <?php if($pfile =='home.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>><a href="home.php" class="dashboard"><img src="assets/icons/small_icons_3/dashboard.png" alt="" /><span class="current">Dashboard</span></a></li>
                         <?php if(in_array("User",$permission)) { ?>
                                     
						<li <?php if($pfile =='create_user.php' || $pfile =='view_users.php' || $pfile =='edit_user.php' || $pfile =='user.php' || $pfile =='export.php' || $pfile =='bulkupload.php' || $pfile =='manual.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>><a href="user.php?status=active"><img src="assets/icons/small_icons_3/users.png" alt="" /><span>User Management</span></a>
						</li>
						<?php }  if(in_array("Investment",$permission)) { ?>
						<li 
						<?php if($pfile =='manualdeposit.php' || $pfile =='deposit.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>
						><a href="deposit.php?act=active"><img src="assets/icons/small_icons_3/media.png" alt="" /><span>Investment </span></a>
						</li>
						<?php }  if(in_array("Plan",$permission)) { ?>
                        <li 
						<?php if($pfile =='create_plans.php'  || $pfile =='edit_plans.php' ||  $pfile=='add_interest.php' || $pfile =='plans.php' || $pfile =='view_interest.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>
						><a href="plans.php"><img src="assets/icons/small_icons_3/Box.png" alt="" /><span> Plan Management</span></a>
						</li>
                       <?php }  if(in_array("Content",$permission)) { ?>
                  	
                        
						
						<li <?php if($pfile =='cms.php' || $pfile =='forexnews.php' || $pfile =='add_forexnews.php' || $pfile =='edit_forexnews.php'  || $pfile =='faq.php' || $pfile =='forex_news.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>><a href="cms.php?id=1"><img src="assets/icons/small_icons_3/Clipboard.png" alt="" /><span>Content</span></a>
							
						</li>
                       
						<?php }  if(in_array("Financials",$permission)) { ?>
                       
					
						<li <?php if($pfile =='withdraw.php' || $pfile =='database.php' || $pfile =='transactions.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>><a href="transactions.php"><img src="assets/icons/small_icons_3/coin.png" alt="" /><span>Financials</span></a>
						
						</li>
                        <?php }  if(in_array("Preferences",$permission)) { ?>
						<li <?php  if($pfile =='send_letter.php'  || $pfile =='add_news.php' || $pfile =='mail_subjects.php' || $pfile =='edit_news.php' || $pfile =='news.php' ) { echo 'class="current"'; } else { echo 'class=""'; } ?>><a href="news.php"><img src="assets/icons/small_icons_3/notes.png" alt="" /><span>Preferences</span></a>
						
						</li>
						<?php }  if(in_array("Settings",$permission)) { ?>
                        	<li <?php  if($pfile =='general_settings.php' || $pfile =='network_settings.php' || $pfile =='payment_settings.php' || $pfile =='member_settings.php' ||  $pfile =='site_settings.php' || $pfile =='popup.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>><a href="site_settings.php"><img src="assets/icons/small_icons_3/settings.png" alt="" /><span>Settings</span></a>
						
						</li>
                        
                        
                  <?php }  if(in_array("Referral",$permission)) { ?>
                        
                        <li <?php  if($pfile =='promotional.php'|| $pfile =='level_status.php' || $pfile =='edit_level.php' || $pfile =='add_level.php' || $pfile =='level_settings.php' || $pfile =='add_promotional.php'|| $pfile =='edit_promotional.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>>
                        <a href="promotional.php"><img src="assets/icons/small_icons_3/Safe.png" alt="" /><span>Promotional Tools</span></a>
						
						</li>
						
						  <?php }  /*if(in_array("SubAdmin",$permission)) { ?>
                        
                        <li <?php  if($pfile =='create_subadmin.php' || $pfile =='subadmin.php'  || $pfile =='edit_subadmin.php') { echo 'class="current"'; } else { echo 'class=""'; } ?>>
                        <a href="subadmin.php"><img src="assets/icons/small_icons_3/Finder.png" alt="" /><span>SubAdmin Manage</span></a>
						
						</li>
                     				 
					     <?php }  */ ?>                  
						<li><a href="logout.php"><img src="assets/icons/small_icons_3/logout.png" alt="" /><span>Logout</span></a></li>
						
					</ul>
				</div> <!-- navigation menu end -->
			</div> <!-- sidebar end -->