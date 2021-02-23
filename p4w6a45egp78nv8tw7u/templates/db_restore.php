<!--Content Portion Start-->
<?
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }

	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
	{
		/*echo "<pre>";
		print_r($_FILES);
		exit();*/
	
		/*$file_name = $_FILES['txtsub']['name'];
	
		if($file_name == '' )
		{
			$flad = 1;
			$_SESSION['empty_file_sub'] ="<span class='validate_error'>Please select the File </span>";
		}
		
		if($file_name != '' && $_FILES['txtsub']['type'] != 'text/x-sql')
		{
			$flad = 1;
			$_SESSION['empty_file_sub'] ="<span class='validate_error'>Please import .sql file type</span>";
		}

		if($flad != 1)
		{
		
		
				$file_re=fopen($_FILES['txtsub']['tmp_name'],'r');
				$res=fread($file_re,filesize($_FILES['txtsub']['tmp_name']));
					$res_file=htmlentities($res);
			$restore = mysql_query($res_file);
			if($restore)
			{
			$_SESSION['success_flag']='<font color="#006600">Your Database Restore has Successfully </font>';
			echo '<meta http-equiv="refresh" content="0; url=db_restore.php" />';
			exit();
			}
			else
			{
				$_SESSION['empty_pass']="<font color='#FF0000' size=1>Sorry Database could not restore.</font>";
			echo '<meta http-equiv="refresh" content="0;url=db_restore.php">';
			exit();
			}
		}
		else
		{
			$_SESSION['empty_pass']="<font color='#FF0000' size=1>Please check the below details.</font>";
			echo '<meta http-equiv="refresh" content="0;url=db_restore.php">';
			exit();
		}
		*/
	function restoreQuery($dfilename,$dbname,$conn)
	{
	
		$file=fread(fopen('dbbackup/'.$dfilename, "r"), filesize('dbbackup/'.$dfilename));	
		$query=explode(";\n",$file);	
				
		for ($i=0;$i<count($query)-1;$i++) 
		{    	
							
			if(!mysql_db_query($dbname,$query[$i],$conn))
			{	
				throw new Exception(mysql_error());		
			}	
					
		}
		unlink('db_back/'.$dfilename);
		return true;
	}	
    
    
    
    function restoreTables($dbhost,$dbuser,$dbpass,$dbname)
	{
		
		if($_FILES['txtsub']['name'] != '')
		{
			$sfilename=$_FILES['txtsub']['tmp_name'];
			$dfilename=date('YmdHis').'_'.$_FILES['txtsub']['name'];
			if(move_uploaded_file($sfilename,'dbbackup/'.$dfilename))
			{				
				$dbhost = $dbhost;
				$dbuser = $dbuser;
				$password = $dbpass;
				$dbname=  $dbname;				
				
      				$conn = mysql_connect($dbhost,$dbuser,$password); 
				if(!$conn)
				{
					$_SESSION['error_message'] = 'Failed to Establish Database Connection.Restore Failed.';	
				}
				else
				{
					
					try
					{
						restoreQuery($dfilename,$dbname,$conn);
						$_SESSION['success_flag'] = 'DataBase Restored Successfully';	
					}	
					catch(Exception $e)
					{
						$error=$e->getMessage();
						$_SESSION['error_message']=$error;
					}					

					
				}				
			}
			else
			{
			 	$_SESSION['error_message']="Uploading of Files Failed. Try Again Later...";
			}
		}
		else
		{
			$_SESSION['error_message']="Invalid File Format. Please Upload a valid One";
		}
		
		return true;
	}
     restoreTables($dbhost,$dbuser,$dbpass,$dbname);
		
	}

    ?>

<form name='form1' method='post' action="db_restore.php" enctype="multipart/form-data" >
<div id="primary_right">
				<div class="inner" style="width:70%">
					<? require 'include/top/site_settings.php';
 ?>
					<hr />

					<h1>Database Restore</h1>
				 <? if($_SESSION['success_flag']) 
					 { 
					?>
					<div class="notification success"> 
					<span></span> 
					<div class="text"> 
						<p><strong>Success!</strong> <? echo $_SESSION['success_flag']; $_SESSION['success_flag']=''; ?> </p> 
					</div> 
					</div>
					<?
					
					}
					?>
                    <? if($_SESSION['error_message']) 

					 { 

					?>

					<div class="notification error"> 

						<span></span> 

						<div class="text"> 

							<p><strong>Error!</strong> <? echo $_SESSION['error_message']; $_SESSION['error_message']=''; ?></p> 

						</div> 

					</div>

					<?

					

					}

					?>
					<fieldset>
						<legend>Restore Your Database</legend>
						
						
						<p>
							Import your Database for Restore.
							
							
						</p>
				
						<p>
							<label>Import DB File:</label>
							<input class="mf" name="txtsub" type="file" value="" /><? if($_SESSION['empty_file_sub']) { echo $_SESSION['empty_file_sub']; $_SESSION['empty_file_sub']=''; } ?>
							
						</p>
                        <p style="margin:-10px 150px">
                        (File should be .sql type)
                        </p>
						
					
					
						
						<p>
						
						<hr />
						
						<div class="clearboth"></div>
						
						<p><input type="hidden" name="submit" value="1" /><input class="button" type="submit" value="Submit" name="submit" /></p>
					</fieldset>
					<div class="clearboth"></div>
					
				</div> <!-- inner -->
			</div>
</form>