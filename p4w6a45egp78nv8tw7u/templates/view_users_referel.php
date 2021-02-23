<?php
unset($_SESSION['totcommission1']);
unset($_SESSION['totcommission2']);
unset($_SESSION['totcommission3']);
unset($_SESSION['totcommission4']);
unset($_SESSION['totcommission']);


	  function getlevelactive1($n,$level)
	  {
			static $count = 0;
			if($level == 0)
			{
			 $count = $count-$count ; 
			}
			$id="intro_id";
			$sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
			$result = mysql_query($sql);
			if(mysql_num_rows($result)==0)
				$level--;
			else
				$level++;
			if($level == 0) $level = 1;
	
	
			while($row=mysql_fetch_array($result))
			{
				if($level == 1)
				{
					$count++;
					for($j=1;$j<=$level*3;$j++) echo "";				
				}
				getlevelactive1($row["member_id"],$level);
			}
			if($level < 0)
			{
				$count =0;
			}
			return $count;
		}
		function getlevelactive2($n,$level)
	  {
			static $count = 0;
			if($level == 0)
			{
				 $count = $count-$count ; 
			}
			$id="intro_id";
			$sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
			$result = mysql_query($sql);
			if(mysql_num_rows($result)==0)
				$level--;
			else
				$level++;
			if($level == 0) $level = 1;
	
	
			while($row=mysql_fetch_array($result))
			{
				if($level == 2)
				{
					$count++;
					for($j=1;$j<=$level*3;$j++) echo "";				
				}
				getlevelactive2($row["member_id"],$level);
			}
			if($level < 0)
			{
				$count =0;
			}
			return $count;
		}
	
		function getlevelactive($n,$level)
	  {
			static $count = 0;
			if($level == 0)
			{
			 $count = $count-$count ; 
			}
			$id="intro_id";
			$sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='active'" ;
			$result = mysql_query($sql);
			if(mysql_num_rows($result)==0)
				$level--;
			else
				$level++;
			if($level == 0) $level = 1;
	
	
			while($row=mysql_fetch_array($result))
			{
				if($level <= 2)
				{
					$count++;
					for($j=1;$j<=$level*3;$j++) echo "";	
				}			
				
				getlevelactive($row["member_id"],$level);
			}
			if($level < 0)
			{
				$count =0;
			}
			return $count;
		}
		
		
		 function getlevelinactive1($n,$level)
	  {
			static $count = 0;
			if($level == 0)
			{
			 $count = $count-$count ; 
			}
			$id="intro_id";
			$sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
			$result = mysql_query($sql);
			if(mysql_num_rows($result)==0)
				$level--;
			else
				$level++;
			if($level == 0) $level = 1;
	
	
			while($row=mysql_fetch_array($result))
			{
				if($level == 1)
				{
					$count++;
					for($j=1;$j<=$level*3;$j++) echo "";				
				}
				getlevelinactive1($row["member_id"],$level);
			}
			if($level < 0)
			{
				$count =0;
			}
			return $count;
		}
		function getlevelinactive2($n,$level)
	  {
			static $count = 0;
			if($level == 0)
			{
			 $count = $count-$count ; 
			}
			$id="intro_id";
			$sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
			$result = mysql_query($sql);
			if(mysql_num_rows($result)==0)
				$level--;
			else
				$level++;
			if($level == 0) $level = 1;
	
	
			while($row=mysql_fetch_array($result))
			{
				if($level == 2)
				{
					$count++;
					for($j=1;$j<=$level*3;$j++) echo "";				
				}
				getlevelinactive2($row["member_id"],$level);
			}
			if($level < 0)
			{
				$count =0;
			}
			return $count;
		}
	
	  function getlevelinactive($n,$level)
	  {
			static $count = 0;
			if($level == 0)
			{
			 $count = $count-$count ; 
			}
			$id="intro_id";
			$sql = "SELECT * FROM members WHERE ".$id."='".$n."' AND status='new'" ;
			$result = mysql_query($sql);
			if(mysql_num_rows($result)==0)
				$level--;
			else
				$level++;
			if($level == 0) $level = 1;
	
	
			while($row=mysql_fetch_array($result))
			{
				if($level <= 2)
				{
					$count++;
					for($j=1;$j<=$level*3;$j++) echo "";				
					
				}
				getlevelinactive($row["member_id"],$level);
			}
			if($level < 0)
			{
				$count =0;
			}
			return $count;
		}
			
		

?>


<div id="primary_right">

			
                <div class="inner" >
   <h1 style="color:#fff" >User Details</h1>
<?php require 'include/top/userprofile.php'; ?>
					 <!-- end dashboard items -->

					<hr />
                 
                    
                    
                     <?php if($_SESSION['success_flag'] != '')
					  { 
					  echo '<div class="notification success"> 
							<span></span> 
							<div class="text"> 
							<p><strong>Success!</strong>'.$_SESSION['success_flag'].'</p> 
							</div> 
						 </div>';
						} ?>
                        
                        <?php if($_SESSION['errror_msg'] != '')
					  { 
					  echo '<div class="notification error" style="cursor: auto;"> 
						<span></span> 
						<div class="text"> 
							<p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;"><canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas><cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['errror_msg'].'</font></p> 
						</div> 
					</div>';
						} ?>
                        
                
<h1>Referel Details</h1>

<div align="right"><a class="button_link" href="javascript: history.go(-1)">Back</a></div><br />
           
          <?php
		  	$fetch = mysql_fetch_array(mysql_query("select * from members where member_id=".$_GET['id']));
			$country = mysql_fetch_array(mysql_query("select * from country_master where country_id='".$fetch['country']."'"));
			//$language = mysql_fetch_array(mysql_query("select * from  language_details where language_id='".$fetch['language_id']."'"));
		  	
		  ?>
		  	  			<table width="100%" border="0" class="normal tablesorter fullwidth">	
				
				  
                    <tr class="row1">
                	<td style="height:35px"><strong>Level</strong></td>	
                    <td ><strong>First Level</strong></td>
                    <td class="orange"><strong>Second Level</strong></td>
                   
                    <td class="orange"><strong>Total</strong></td>
                  </tr>
                  
                  <tr class="odd">
                	<td style="height:35px"><strong>ACTIVE REFERALS</strong></td>	
                    <td ><?php echo getlevelactive1($_GET['id'],0); ?></td>
                    <td class="orange"><?php echo getlevelactive2($_GET['id'],0); ?></td>
                   
                    <td class="orange"><?php echo getlevelactive($_GET['id'],0); ?></td>
                  </tr>
                   <tr class="odd">
                	<td style="height:35px"><strong>IN ACTIVE REFERRALS</strong></td>	
                    <td class="orange"><?php echo getlevelinactive1($_GET['id'],0); ?></td>
                    <td class="orange"><?php echo getlevelinactive2($_GET['id'],0); ?></td>
                    
                    <td class="orange"><?php echo getlevelinactive($_GET['id'],0); ?></td>
                  </tr>
                 
                 <?PHP
				 $total_commissions=mysql_fetch_array(mysql_query("select sum(amount) as commissions from history where type='commissions' and user_id=".$fetch['member_id']));

						$total_commissions = $total_commissions['commissions'];
				 ?>
                  <tr class="odd">
                	<td colspan="3" align="right" style="height:35px"><strong>TOTAL REFERRAL COMISSION</strong></td>	
                   <td class="orange">$<?php echo number_format($total_commissions,2); ?></td>
                  </tr>
                  
                  
                 
                  
                </table>
				
			
     </table>
     <div class="regis_topbox1">



<table width="100%" border="0" class="normal tablesorter fullwidth">	                
				 <tr class="odd">
                	<td style="height:35px"><strong>Level Id</strong></td>	
                    <td ><strong>Username</strong></td>
                    <td class="orange"><strong>Name</strong></td>
                    <td class="orange"><strong>Investment Amount</strong></td>
                  </tr>
                  
                  <?php
				  function getlist($n,$level)
				{
		static $count = 0;
		$id="intro_id 	";
		
 		$sql = "select * from members where ".$id."=".$n;
		$result = mysql_query($sql);
		if(mysql_num_rows($result)==0)
			$level--;
		else
			$level++;
		if($level == 0) $level = 1;
		
		while($row=mysql_fetch_array($result))
		{
		
			if($level <= 2)
			{

					$count++;
					$name = $row["username"];	
					$fname=$row['first_name'];
					$mail = $row["mail_id"];
					$mem_mmm = $row["member_id"];
					$total_deposit = mysql_fetch_array(mysql_query("select sum(amount) as amt from deposit where member_id = ".$mem_mmm));
					for($j=1;$j<=$level*3;$j++) echo "";
					
					
					echo "<tr class='odd'>";
					echo "<td style='height:35px'>".$level."</td>";
					echo '<td class="orange">
					
					<div class="fade_hover tooltip" title="clik to view the '.$fname.' details">

				 <a href="view_users.php?id='.$mem_mmm.'" style="text-decoration:none;color:#353535;">'.$name.'</a>

				  </div></td>';
					echo "<td class='orange'>".$fname."</td>";
					echo "<td class='orange'>".number_format($total_deposit['amt'],2)." USD</td>";
					echo "</tr>";
								
					getlist($row["member_id"],$level);
			}
		}
		return $count;
	}
				
				$memid = $_GET['id']; 
				$count = getlist($memid,0);
				  	
				  ?>
                  
                  </table>
                
</div>
                 <div class="clearboth"></div>
</div> <!-- inner -->
</div>
<!--Content Portion End-->