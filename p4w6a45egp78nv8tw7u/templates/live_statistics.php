<!--Content Portion Start-->
<?php
error_reporting(0);
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	
	
	if(count($_POST) > 0)
	{


	
	
	
	
	
	if($_POST['submit'])
	{

		$started = $_POST['started'];
		$runningdays = $_POST['runningdays'];
		$totacc = $_POST['totacc'];
		$actacc = $_POST['actacc'];
		$totdep = $_POST['totdep'];
		
		$totwithdraw = $_POST['totwithdraw'];
		$newmember = $_POST['newmember'];
		$visitoronline = $_POST['visitoronline'];
		$memberonline = $_POST['memberonline'];
		$editrunning = $_POST['editrunning'];
		$editaccounts = $_POST['editaccounts'];
	    $lastupdate= $_POST['lastupdate'];
    	$lastdep= $_POST['lastdep'];

		$editactaccounts= $_POST['editactaccounts'];
		$editdeposit= $_POST['editdeposit'];
		$editwithdraw= $_POST['editwithdraw'];
		$editnewmember= $_POST['editnewmember'];
		$editlastwithdraw= $_POST['editlastwithdraw'];
		$editlastdeposit= $_POST['editlastdeposit'];

 
 	
	
/*	
	echo "update live_statistics set 
		started='$started',
		runningdays='$runningdays',
		totacc='$totacc',
		actacc='$actacc',
		totdep='$totdep',
		totwithdraw='$totwithdraw',
		newmember='$newmember',
		visitoronline='$visitoronline',
		memberonline='$memberonline',
		lastupdate='$lastupdate',
		editrunning='$editrunning',
		editaccounts='$editaccounts',
		editactaccounts='$editactaccounts',
		editdeposit='$editdeposit',
		editwithdraw='$editwithdraw',
		editnewmember='$editnewmember',
		editlastwithdraw='$editlastwithdraw',
		editlastdeposit='$editlastdeposit',
		lastdep='$lastdep'
		
		 where id = 1";exit;
	*/
 

		$update1=mysql_query("update live_statistics set 
		started='$started',
		runningdays='$runningdays',
		totacc='$totacc',
		actacc='$actacc',
		totdep='$totdep',
		totwithdraw='$totwithdraw',
		newmember='$newmember',
		visitoronline='$visitoronline',
		memberonline='$memberonline',
		lastupdate='$lastupdate',
		editrunning='$editrunning',
		editaccounts='$editaccounts',
		editactaccounts='$editactaccounts',
		editdeposit='$editdeposit',
		editwithdraw='$editwithdraw',
		editnewmember='$editnewmember',
		editlastwithdraw='$editlastwithdraw',
		editlastdeposit='$editlastdeposit',
		lastdep='$lastdep'
		
		 where id = 1");
	
		
		
		$_SESSION['succ_dir']='<font color="#006600">Successfully Updated</font>';
		echo '<meta http-equiv="refresh" content="0; url=live_statistics.php" />';
		exit();
	}
	
	}

	
	
?>




<?php
	$fetch8=mysql_fetch_array(mysql_query("select * from live_statistics"));


?>
 <form action="live_statistics.php" method='post' enctype="multipart/form-data" name='form1' >
<div id="primary_right">
				<div class="inner" style="width:70%">
<?php require 'include/top/site_settings.php'; ?>

					 <!-- end dashboard items -->
					  <!-- sortable end -->
					<hr />

					<h1>Live Statistics</h1>
                      <?php if($_SESSION['succ_dir'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['succ_dir'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
              <?php if($_SESSION['empty_pass'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						</div> 
					</div>';
						} ?>
                        
                        
                        
					<fieldset>
						<legend>Manage your Live Statistics</legend>
                        
                        <p>
							<label>Site Started Date:</label>
                            
						                           
                      <input name="started" type="text" class="mf" id="started" value="<?php echo $fetch8['started']; ?>" />&nbsp;Y-m-d(Example: : 2012-09-13)
							
							
						</p>
						
						
						<p>
							<label>Running Days:</label>
						                           
                            <input name="runningdays" type="text" class="mf" id="runningdays" value="<?php echo $fetch8['runningdays']; ?>" />&nbsp;
							<select name="editrunning">
							<option value="1" <?php if($fetch8['editrunning']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editrunning']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editrunning']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>
							 


						</p>
                        
                        <p>
							<label>Total Accounts:</label>
						                           
                            <input name="totacc" type="text" class="mf" id="totacc" value="<?php echo $fetch8['totacc']; ?>" />&nbsp;
							<select name="editaccounts">
							<option value="1" <?php if($fetch8['editaccounts']==1) { ?> selected="selected" <?php  } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editaccounts']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editaccounts']==3) { ?> selected="selected" <? } ?>>Add this Value with Actual Value</option>
							 </select>
							
						</p>
						
						
                 	<p>
							<label>Active Accounts:</label>
			<input name="actacc" type="text" class="mf" id="actacc" value="<?php echo $fetch8['actacc']; ?>"  />&nbsp;
			<select name="editactaccounts">
				<option value="1" <?php if($fetch8['editactaccounts']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
				<option value="2" <?php if($fetch8['editactaccounts']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
	<option value="3" <?php if($fetch8['editactaccounts']==3) { ?> selected="selected" <?php  } ?>>Add this Value with Actual Value</option>
			 </select>
			</p>
                        
                        <p>
							<label>Total deposited:</label>
						<input name="totdep" type="text" class="mf" id="totdep" value="<?php echo $fetch8['totdep']; ?>"  /> &nbsp;
							<select name="editdeposit">
							<option value="1" <?php if($fetch8['editdeposit']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editdeposit']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editdeposit']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>

							
						</p>
						
		
						<p>
							<label>Total withdraw:</label>
							<input name="totwithdraw" type="text" class="mf" id="totwithdraw" value="<?php echo $fetch8['totwithdraw']; ?>" />&nbsp;
							<select name="editwithdraw">
							<option value="1" <?php if($fetch8['editwithdraw']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editwithdraw']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editwithdraw']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>
							
						</p>
                        
           
              
              

						<p>
						
							<label>Newest member:</label>
							<input name="newmember" type="text" class="mf" id="newmember" value="<?php echo $fetch8['newmember']; ?>" />&nbsp;
							<select name="editnewmember">
							<option value="1" <?php if($fetch8['editnewmember']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editnewmember']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							 </select>
						</p>
						<p>
							<label>Today withdraw:</label>
							<input name="lastwithdraw" type="text" class="mf" id="lastwithdraw" value="<?php echo $fetch8['lastwithdraw']; ?>" />&nbsp;
							<select name="editlastwithdraw">
							<option value="1" <?php if($fetch8['editlastwithdraw']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editlastwithdraw']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editlastwithdraw']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>
							
						</p>
						<p>
							<label>Today deposit:</label>
							<input name="lastdep" type="text" class="mf" id="lastdep" value="<?php echo $fetch8['lastdep']; ?>" /> &nbsp;
							<select name="editlastdeposit">
							<option value="1" <?php if($fetch8['editlastdeposit']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editlastdeposit']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editlastdeposit']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>
							
						</p>
							<p>
							<label>Visitor online:</label>
							<input name="visitoronline" type="text" class="mf" id="visitoronline" value="<?php echo $fetch8['visitoronline']; ?>" /><!--&nbsp;
							<select name="editlastdeposit">
							<option value="1" <?php if($fetch8['editlastdeposit']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editlastdeposit']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editlastdeposit']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>-->
							
						</p>
							<p>
							<label>Members online:</label>
							<input name="memberonline" type="text" class="mf" id="memberonline" value="<?php echo $fetch8['memberonline']; ?>" /><!--&nbsp;
							<select name="editlastdeposit">
							<option value="1" <?php if($fetch8['editlastdeposit']==1) { ?> selected="selected" <?php } ?>>Show Actual Value</option>
							<option value="2" <?php if($fetch8['editlastdeposit']==2) { ?> selected="selected" <?php } ?>>Show this Value</option>
							<option value="3" <?php if($fetch8['editlastdeposit']==3) { ?> selected="selected" <?php } ?>>Add this Value with Actual Value</option>
							 </select>
							-->
						</p>
							<p>
							<label>Latest update:</label>
							<input name="lastupdate" type="text" class="mf" id="lastupdate" value="<?php echo $fetch8['lastupdate']; ?>" />&nbsp;Y-m-d(Example: : 2012-09-13)
							
						</p>
						
                       					
						<div class="clearboth"></div>
						
					<p align="center" style="padding-right:400px">
                    
                         <input type="hidden" name="submit" value="1" />
                       <input class="button" type="submit" value="Submit" name="update" /></p>
					</fieldset>	
				</div> <!-- inner -->
			</div>
</form>
