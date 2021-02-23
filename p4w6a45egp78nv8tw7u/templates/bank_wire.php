<!--Content Portion Start-->

<? 
	
	if($_POST['submit'])
	{
		
		foreach($_POST as $key => $val)
		{
			if($key != 'status' && $key !='submit')
			{
				if($_POST['status'][$key] == '')
				{
					$status_val = 'off';
				}
				else
				{
					$status_val = $_POST['status'][$key];
				}
				$update = mysql_query("update bank_wire set account_id='".$val."',status='".$status_val."' where bank_id = '".$key."'");
			}
		}

		$_SESSION['succ_dir']='<font color="#006600">Your Bank Wire Settings has Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=bank_wire.php" />';
		exit();
	}
	
	
?>
<form name='form1' method='post' action="bank_wire.php" >
<div id="primary_right">
				<div class="inner" style="width:70%">
<? require 'include/top/site_settings.php'; ?>

					 <!-- end dashboard items -->

					  <!-- sortable end -->
					<hr />

					<h1>Bank Wire Settings</h1>
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
					<fieldset>
						<legend>Manage your Bank Wire Details</legend>
						
						<?
							$select_payment = mysql_query("select * from bank_wire");
							
							while($fetch = mysql_fetch_array($select_payment))
							{
						?>
						
						<p>
							<label><?=$fetch['bank_name']; ?> :</label>
							
							<input class="mf" name="<?=$fetch['bank_id']; ?>" type="text" value="<?=$fetch['account_id']; ?>" />
							
							<label>Status :</label><input type="checkbox" <? if($fetch['status'] == 'on') echo ' checked="checked"'; ?> class="iphone" name="status[<?=$fetch['bank_id']; ?>]" />
							
						</p>
						
						<?
						}
						?>
						

					
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>