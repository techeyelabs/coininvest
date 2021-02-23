<?
function CreateOption($cboname,$curid,$tablename) {

		echo '<select name=cbo'.ucwords($cboname).' class=cbobig>';
		echo '<option value="">Select</option>';
			$optSql="select * from $tablename";
			if($cboname=='Directory')
				$optSql.=" where status=1";
			$optResult=mysql_query($optSql);
			while($optRow=mysql_fetch_array($optResult)) {
				if($cboname=='Directory')
				{
					if($optRow[0]==$curid)
					echo '<option value='.$optRow[0].' selected="selected">'.$optRow[2].'</option>';
					else
					echo '<option value='.$optRow[0].'>'.$optRow[2].'</option>';
				}
				else
				{
					if($optRow[0]==$curid)
					echo '<option value='.$optRow[0].' selected>'.$optRow[1].'</option>';
					else
					echo '<option value='.$optRow[0].'>'.$optRow[1].'</option>';
				}
			}
			echo '</select>';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administrator Control Panel</title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script src="js/row_color.js" type="text/javascript"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js"></script>
<script type="text/javascript" src="js/ddlevelsmenu.js"></script>
<style type="text/css">
/* menu styles end  */
.downarrowpointer { /*CSS for "down" arrow image added to top menu items*/ background:none; border: 0; }
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<!--<script type='text/javascript' src='http://www.google.com/jsapi'></script>-->

<?
	 $logo=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id = '1'"));

?>

</head>
<body onload="MM_preloadImages('images/min_arrow2.gif','images/upgrade_bttn_hov.gif')">
<!--Header Portion Start-->
<div class="header_part" >
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="344" class="logo_pad"><a href="home.php"><img src="images/no_logo.gif" alt="Logo" width="183" height="80" border="0" /></a></td>
      <td width="646" align="right" valign="top" class="toogle_pad"><table width="80%" border="0" cellspacing="0" cellpadding="0">
         
         
          <tr>
            <td align="right" class="top_link">Welcome Administrator !</td>
          </tr>
           <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right" class="top_link"><a href="changepassword.php">Change Password</a> &nbsp;|&nbsp; <a href="logout.php">Logout</a></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="2" class="top_nav_bar"><div id="ddtopmenubar" class="topmainmenu">
      <?
		$file = $_SERVER["SCRIPT_NAME"];
		$break = explode('/', $file);
		$pfile = $break[count($break) - 1];

?>
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td <? if($pfile =='home.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="home.php"><span>Dashboard</span></a></td>
              <td class="top_nav_separator"></td>
              <td  <? if($pfile =='create_user.php' || $pfile =='edit_user.php' || $pfile =='user.php' || $pfile =='export.php' || $pfile =='bulkupload.php' || $pfile =='manual.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu1"><span>User Management</span></a></td>
			  <td class="top_nav_separator"></td>
              <td  <? if($pfile =='cms.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu2"><span>Content</span></a></td>
			  <td class="top_nav_separator"></td>
              <td  <? if($pfile =='error.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu3"><span>Templates Management</span></a></td>
			  <td class="top_nav_separator"></td>
              <td  <? if($pfile =='send_letter.php' || $pfile =='news.php' || $pfile =='promotional.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu4"><span>Preferences</span></a></td>
			   <td class="top_nav_separator"></td>
              <td  <? if($pfile =='send_letter.php' || $pfile =='news.php' || $pfile =='promotional.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu5"><span>Products Management</span></a></td>
			   <td class="top_nav_separator"></td>
              <td  <? if($pfile =='listing.php' || $pfile =='database.php' || $pfile =='transactions.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu6"><span>Financial</span></a></td>
              
              <td class="top_nav_separator"></td>
			   <td  <? if($pfile =='general_settings.php' || $pfile =='network_settings.php' || $pfile =='payment_settings.php' || $pfile =='member_settings.php' || $pfile =='level_settings.php' || $pfile =='site_settings.php' || $pfile =='popup.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu7"><span>Settings</span></a></td>
              
             
              <td class="top_nav_separator"></td>
              <!--<td  <? if($pfile =='invoice.php') { echo 'class="nav_selected"'; } else { echo 'class="nav_links"'; } ?>><a href="#" rel="ddsubmenu6"><span>Lanaguages</span></a></td>
              <td class="top_nav_separator"></td>-->
              <!--<td class="nav_links"><a href="#" rel="ddsubmenu7"><span>Others</span></a></td>-->
              
              
              
              <td>&nbsp;</td>
            </tr>
          </table>
        </div>
        <script type="text/javascript">
ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
</script>
   <!-- <ul id="ddsubmenu1" class="ddsubmenustyle">
          <li><a href="create_user.php">Create User</a></li>
          <li><a href="user.php?status=active">View Active Users</a></li>
          <li><a href="user.php?status=suspend">View suspended Users</a></li>
          <li><a href="export.php">Export Users</a></li>
          <li><a href="bulkupload.php">Bulk Upload of Users</a></li>
          <li><a href="manual.php">Manual Upgrade</a></li>
        </ul>-->
		
		<ul id="ddsubmenu1" class="ddsubmenustyle">
          <li><a href="create_user.php">Create User</a></li>
          <li><a href="user.php?status=active">View Active Users</a></li>
          <li><a href="user.php?status=suspend">View suspended Users</a></li>
          <li><a href="manual.php">Email Members</a></li>
        </ul>
		
		<ul id="ddsubmenu2" class="ddsubmenustyle">
          <li><a href="cms.php?id=1">Tutorial</a></li>
          <li><a href="cms.php?id=2">Compensation plan</a></li>
          <li><a href="cms.php?id=3">Overview</a></li>
          <li><a href="cms.php?id=4">About us</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="cms.php?id=5">Support</a></li>
          <li><a href="cms.php?id=6">How can I use MLM</a></li>
          <li><a href="cms.php?id=7">Feature list for New MLM</a></li>
	      <li><a href="cms.php?id=8">Invite your friends</a></li>
		  <li><a href="cms.php?id=9">Sponsor Details</a></li>
		  <li><a href="cms.php?id=10">Terms and Conditions</a></li>
		  <li><a href="cms.php?id=11">Disclaimer</a></li>
		  <li><a href="cms.php?id=12">Privacy Policy</a></li>
		  <li><a href="cms.php?id=13">Contact Us</a></li>
        </ul>
		
		<ul id="ddsubmenu3" class="ddsubmenustyle">
          <li><a href="create_user.php">Create User</a></li>
          <li><a href="user.php?status=active">View Active Users</a></li>
          <li><a href="user.php?status=suspend">View suspended Users</a></li>
          <li><a href="manual.php">Email Members</a></li>
        </ul>
		
		 <ul id="ddsubmenu4" class="ddsubmenustyle">
		  <li><a href="send_letter.php">Send Newsletter</a></li>
		  <li><a href="news.php">Site News Management</a></li>
		  <li><a href="promotional.php">Promotional Tools</a>
		   <ul>
			  <li><a href="promotional.php">Banners</a></li>
			  <li><a href="text_link.php">Text Links</a></li>
			  <li><a href="videos.php">Videos</a></li>
	
			</ul>
		 </li>
		</ul>
		
		<ul id="ddsubmenu5" class="ddsubmenustyle">
          <li><a href="create_user.php">Create User</a></li>
          <li><a href="user.php?status=active">View Active Users</a></li>
          <li><a href="user.php?status=suspend">View suspended Users</a></li>
          <li><a href="manual.php">Email Members</a></li>
        </ul>
		
	  <ul id="ddsubmenu6" class="ddsubmenustyle">
	  <li><a href="transactions.php">Transacations</a></li>
	 
	</ul>
		
        <ul id="ddsubmenu7" class="ddsubmenustyle">
          <li><a href="general_settings.php">General Settings</a></li>
          <li><a href="payment_settings.php">Payment Settings</a></li>
          <li><a href="member_settings.php">Member Settings</a></li>
          <li><a href="level_settings.php">Level Settings</a></li>
         <!-- <li><a href="construct.php">Sub Admin Settings</a></li>-->
          <li><a href="site_settings.php">Site Settings</a></li>
          <!--<li><a href="popup.php">Pop Over Settings</a></li>-->
          
        </ul>
     
        </td>
    </tr>
  </table>
</div>
<!--Header Portion End-->