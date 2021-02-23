<?PHP session_start();
error_reporting(0);
	require 'include/connect.php';
	define("ROOT_FOLDER",'../');
	/*
	echo "<pre>";
	print_r($_POST);
	exit();
	*/
	if($_GET['mem_id'])
	{
		$sql="DELETE FROM custompage_table WHERE page_id=".(int)$_GET['mem_id'];
		$_SESSION['old_cpass']="<font color='#FF0000'>Custom page Successfully Deleted</font>";
		echo '<meta http-equiv="refresh" content="0;url=page.php">';
		exit();	
	}
	
	if(isset ($_POST['submit']))
	{
		$title=$_POST['page_title'];
		$body=$_POST['bodycontent'];
		$meta=$_POST['meta_content'];
		$metakey=$_POST['meta_key'];
		$pagename='index.php';
		$language = $_POST['language'];
		
		$splash = rand(0,9999);
		mkdir('../userpage/'.$splash.'', 0777, true);
		/*if($title == '')
		{
			$_SESSION['succ_dir']="<font color='#FF0000'>Please Enter the Page Title</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_page.php">';
			exit();
		}
		if($body == '')
		{
			$_SESSION['succ_dir']="<font color='#FF0000'>Please Enter the Body Content</font>";
			echo '<meta http-equiv="refresh" content="0;url=add_page.php">';
			exit();
		}*/
		
		if(get_magic_quotes_gpc())
		{
			$title = stripslashes($title);
			$body=stripslashes($body);
			$meta=stripslashes($meta);
			$metakey=stripslashes($metakey);
			$pagename=stripslashes($pagename);
		}
		
	if($_FILES['images_file']['type'] == 'application/zip')
	{

		$image_name = $_FILES['images_file']['name'];
		$image_fol= $_FILES['images_file']['tmp_name'];	
	
		$stpath="../userpage/".$splash."/temp/".$image_name;
		if(move_uploaded_file($image_fol,$stpath))
		{
			$storename = '';
			$zip = new ZipArchive;
			$zipfilename = $stpath;	
	 
			if ($zip->open($zipfilename) === TRUE)
			{
				$unzippath='../userpage/'.$splash.'/images';	
							
				$zip->extractTo($unzippath);				
				CHMOD($unzippath,0777);
				$zip->close();	
			}		
			CHMOD($unzippath,0755);
			
		}
		
	}
		$pagename='userpage/'.$splash.'/'.$pagename;
		
		$cssfilepath=$_FILES['css_file']['name'];
		$jsfilepath=$_FILES['js_file']['name'];
		
		$writeString.='<?php session_start(); 
		
		$_SESSION[introname]=$_GET[refer_id]; 
		
		?>';
	
		$writeString.="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
	<head><title>".$title."</title><meta name='description' content='". $meta . "' /><meta name='keywords' content='".$metakey."' /><link href='css/".$cssfilepath."' rel='stylesheet' type='text/css' />  
		<script type='text/javascript' src='script/".$jsfilepath."'></script></head><body>".$body."</body></html>";		
			
		createDyanamicPage($pagename,$writeString);
		addPageSettings($pagename);
		
		$_SESSION['success_flag']="<font color='#004000'><b>New Splash page Successfully Created</b></font>";
		echo '<meta http-equiv="refresh" content="0;url=spage.php">';
		exit();	
	}
	
	
	function createDyanamicPage($pagename,$str)
	{
		
		$file_types=array('php');
		$tmp=explode('.',trim($pagename));
		//PRINT_R($tmp);
		//echo 's'.$pagename;
		
		if(in_array($tmp[1],$file_types)) // checking whether the file is in one of the formats .htm , .html or .php
		{
					
			 uploadCssFile();
			 //uploadJsFile();						
			 
			CreateFile(ROOT_FOLDER.$pagename,'w',$str);
		}
		
	}
	
	function uploadCssFile()
	{
		
		
		if($_FILES['css_file']['name'] != '')
		{
		
			$spath=$_FILES['css_file']['tmp_name'];
			$dpath=ROOT_FOLDER.'userpage/'.$splash.'/css/'.$_FILES['css_file']['name'];
			uploadFile($spath,$dpath);
		}
	}
	
	/**
	 * Function uploads a JS file into the specified folder
	 * 
	 * 
	 * @return void
	 */	 

	function uploadJsFile()
	{
		echo isset($_FILES['js_file']['name']);
		exit();
		if(isset($_FILES['js_file']['tmp_name']))
		{
			$spath=$_FILES['js_file']['tmp_name'];
			$dpath=ROOT_FOLDER.'userpage/'.$splash.'/script/'.$_FILES['js_file']['name'];
			
			uploadFile($spath,$dpath);
		}
	}
	
	function uploadFile($spath,$dpath)
	{
		//echo '<br>path:' .$dpath;
		$temp=explode('/',$dpath);
		
		if($temp[2]!='')
		{
			if (file_exists($dpath))
			{
			
				$_SESSION['succ_dir']="<font color='#FF0000'>Sorry File Name Already exists. Kindly rename the css file and upload it</font>";
				echo '<meta http-equiv="refresh" content="0;url=add_spage.php">';
				exit();
			}
			else
			{
				move_uploaded_file($spath,$dpath);
			}
		}
	}
	
	function CreateFile($filename,$mode,$str2write='')
	{
			$fp=fopen($filename,$mode);			
			if($fp)
			{
				fwrite($fp,$str2write);
				fclose($fp);
			}
			else
			{
				$_SESSION['succ_dir']="<font color='#FF0000'>New page Cannot be created</font>";
				echo '<meta http-equiv="refresh" content="0;url=add_spage.php">';
				exit();
			}
			
	}
	
	function addPageSettings($pagename)
	{
		//$update = mysql_query("update custompage_table set page_name='".$_POST['page_name']."', page_url='".$pagename."', content='".$_POST['bodycontent']."', page_title='".$_POST['page_title']."', meta_content='".$_POST['meta_content']."', meta_key='".$_POST['meta_key']."' where page_id =1");
	
		//echo "INSERT INTO splash_pages (page_name,page_url,content,page_title,meta_content,meta_key,language) VALUES ('index.php','".$pagename."','".$_POST['bodycontent']."','".$_POST['page_title']."','".$_POST['meta_content']."','".$_POST['meta_key']."','".$_POST['language']."')";
		
		///exit();
	
		$sql = mysql_query("INSERT INTO splash_pages (page_name,page_url,content,page_title,meta_content,meta_key,language,status) VALUES ('index.php','".$pagename."','".$_POST['bodycontent']."','".$_POST['page_title']."','".$_POST['meta_content']."','".$_POST['meta_key']."','".$_POST['language']."','".$_POST['status']."')");
		if($sql)
		{
			$asdf = 1;
			return $asdf;
		}
				
	}

?>