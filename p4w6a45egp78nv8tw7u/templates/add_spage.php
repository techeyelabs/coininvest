<!--Content Portion Start-->

<? 
	
	//$fetch=mysql_fetch_array(mysql_query("select * from admin_settings where admin_settings_id = 1"));
	
	
	
	if($_POST['submit'])
	{

		$plan_name = $_POST['plan_name'];
		
		$pcdesc = $_POST['month_sub'];
		if($pcdesc != '' && $plan_name != '')
		{
			$dt = date('Y-m-d H:i:s');		
			$update=mysql_query("insert into news(news_header,news_description,dt) values('$plan_name','$pcdesc','$dt')");
			$_SESSION['success_flag']='<font color="#006600">News Created Successfully</font>';
			echo '<meta http-equiv="refresh" content="0; url=news.php" />';
			exit();
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000'>Please enter the both values</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_news.php">';
			exit();
		}
	}
	
	
?>

<form name="fm" method="post" action="spage_validate.php" enctype="multipart/form-data">
<div id="primary_right">
				<div class="inner" style="width:70%">
				
<? require 'include/top/preferences.php'; ?>
					<hr />

					<h1>Site News</h1>
				 <? if($_SESSION['succ_dir']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <? echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?> </p> 
					</div> 
					</div>
					<?
					
					}
					?>
					
					 <? if($_SESSION['empty_pass']) 
					 { 
					?>
					<div class="notification error"> 
						<span></span> 
						<div class="text"> 
							<p><strong>Error!</strong> <? echo $_SESSION['empty_pass']; $_SESSION['empty_pass']=''; ?></p> 
						</div> 
					</div>
					<?
					
					}
					?>
					<div class="two_third column">
						  <div class="portlet">
							<div class="portlet-header"><strong>Note :</strong> API for Creating FORM for Lead Capture</div>
							<div class="portlet-content" style="display: block;">
							  <p> &lt;form name = "form1" action="../../leadcap.php" /&gt;
				  <br /><br />&lt;input name="first_name" type="text" /&gt;
				  <br /><br />&lt;input name="last_name" type="text" /&gt;
				  <br /><br />&lt;input name="country" type="text" /&gt;
				  <br /><br />&lt;input name="email_id" type="text" /&gt;
				  <br /><br />&lt;input name="ip_add" type="hidden" value="&lt;?=$_SERVER['REMOTE_ADDR']; ?&gt;" /&gt;
				  <input type="hidden" name="ip_add" value="<?=$_SERVER['REMOTE_ADDR']; ?>">
				  <br /><br /><font color="#FF0000" style="text-decoration:blink">Please Use above the tags for particular Labels in Splash Page before add the body content</font>
				  </p>
							</div>
						  </div>
						</div>
					<fieldset>
						<legend>Create a New Lead Capture Page</legend>
						
						
						<p>
							<label>Page Title <font color="#FF0000">*</font></label>
							: <input name="page_title" type="text" class="mf" id="month_sub" value="<?=$select_page['page_title']; ?>"  />
                    <br />
                  <? if($_SESSION['empty_page_title']) { echo $_SESSION['empty_page_title']; $_SESSION['empty_page_title']=''; } ?>
							
						</p>
						
						<p>
							<label>Meta Content </label>
							
						: <input name="meta_content" type="text" class="mf" id="month_sub" value=""  />
							
						</p>
						
						
						<p>
							<label>Meta Keyword </label>
							
						: <input name="meta_key" type="text" class="mf" id="month_sub" value=""  />
							
						</p>
						
						<p>
							<label>Css Files </label>
							
						: <input type="file" name="css_file" id="css_file" value="" >&nbsp;&nbsp;<span class="style1"> Should be in .css format  </span>
							
						</p>
						
						<p>
							<label>Images </label>
							
						: <input type="file" name="images_file" id="images_file" value=""/>&nbsp;&nbsp;<span class="style1">Should be in .zip format</span>
							
						</p>
						
						<p>
							<label>Status</label>
							
						: <input type="radio" name="status" value="active" checked="checked" />Active&nbsp;&nbsp;<input type="radio" name="status" value="suspend" />Supend&nbsp;&nbsp;
							
						</p>
						
						<p>
							<label>Body Content  <font color="#FF0000">*</font></label>
							
						: <textarea name="bodycontent" id="body" cols="50" rows="4" class="editor "><?=$select_page['content']; ?></textarea>
							
						</p>
						
						
					
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>