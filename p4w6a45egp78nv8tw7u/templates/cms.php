<?php

 if(!in_array("Content",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	

 ?>
 <script type="text/javascript" src="js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>

<?php
	
	$id=(int)$_GET['id'];
	$fetch=mysql_fetch_array(mysql_query("select * from cms_table where cms_id=$id"));
	
	
	
	if($_POST['txtcontent'])
	{
		$title = $_POST['txt_title']; 
		$title = htmlentities(stripslashes(trim($title)),ENT_QUOTES,'utf-8');
		$txtcontent=trim($_POST['txtcontent']);
		$acalword = htmlentities(stripslashes(trim($txtcontent)),ENT_QUOTES,'utf-8');
		$update=mysql_query("update cms_table set content='".$acalword."',title='".$title."' where cms_id='".$id."'");
		$_SESSION['succ_msg']='<font color="#006600">'.$title.' Content has successfully updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=cms.php?id='.$id.'" />';
		exit();
	}
	
	
?>



<div id="primary_right">
<div class="inner">
   <?php require 'include/top/content_management.php'; ?>
   </div>
				<div class="inner">

					<?php if($_SESSION['succ_msg']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <?php echo $_SESSION['succ_msg']; $_SESSION['succ_msg']=''; ?> </p> 
					</div> 
					</div>
					<?php
					
					}
					?>
					
					<!-- YOUR CONTENT GOES HERE -->
					<hr />

                 
					 
					<fieldset>
						 <form name="form1" method="post" action="cms.php?id=<?=$id; ?>" >
						
						<hr />
						
			

<p>
							<label style="width:40px;">Title <font color="#FF0000">*</font></label>
					: <input type="text" class="full-width" value="<?php echo $fetch['title'];?>" id="txt_title" name="txt_title">
							
						</p>
                        
				<p class="grey">
               
              
                <textarea id="empty_txtcontent" name="txtcontent" style="width:800px; height:400px"><?php echo $fetch['content']; ?></textarea>
                 <br /><?php if($_SESSION['empty_txtcontent']) { echo $_SESSION['empty_txtcontent']; $_SESSION['empty_txtcontent']=''; } ?>
               
              
        		  
               	</p>
                
                
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" /> </p>
                        	</form>
					</fieldset>
					<div class="clearboth"></div>
				</div> <!-- inner -->
			</div>
		
