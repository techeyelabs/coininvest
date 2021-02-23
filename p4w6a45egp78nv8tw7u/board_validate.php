<?PHP session_start();
	//error_reporting(0);
	require 'include/connect.php';

	/*echo "<pre>";
	print_r($_FILES);
	exit();*/
	
	$rank_name = $_POST['rank_name'];
	$board_width = $_POST['board_width'];
	$board_depth = $_POST['board_depth'];
	$epin_amount = $_POST['epin_amount'];
	$board_income = $_POST['board_income'];
	$ebook_desc = $_POST['ebook_desc'];
	$board_status = 'on';
	
	
	
	if($rank_name == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_rank_name']="<span class='validate_error'>Please enter the Rank Name</span>";
	}
	if($board_width == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_board_width']="<span class='validate_error'>Please enter the Board Width</span>";
	}
	/*if($board_width != '' && !is_numeric($board_witdh))
	{
		$firstnameflag=1;
		$_SESSION['empty_board_width']="<span class='validate_error'>Please enter only Numeric Values</span>";
	}*/
	if($board_depth == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_board_depth']="<span class='validate_error'>Please enter the Board Depth</span>";
	}
	if($board_depth != '' && !is_numeric($board_depth))
	{
		$firstnameflag=1;
		$_SESSION['empty_board_depth']="<span class='validate_error'>Please enter only Numeric Values</span>";
	}
	if($epin_amount == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_epin_amount']="<span class='validate_error'>Please enter the E-Pin Fee</span>";
	}
	if($epin_amount != '' && !is_numeric($epin_amount))
	{
		$firstnameflag=1;
		$_SESSION['empty_epin_amount']="<span class='validate_error'>Please enter only Numeric Values</span>";
	}
	if($board_income == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_board_income']="<span class='validate_error'>Please enter the Board Income</span>";
	}
	if($board_income != '' && !is_numeric($board_income))
	{
		$firstnameflag=1;
		$_SESSION['empty_board_income']="<span class='validate_error'>Please enter only Numeric Values</span>";
	}
	if(trim($ebook_desc) == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_ebook_desc']="<span class='validate_error'>Please enter the EBook Description</span>";
	}
	
	
	//*************FILE UPLOAD******************//
	
	$ebook_image = $_FILES['ebook_image']['name'];
	$ebook_image_type = $_FILES['ebook_image']['type'];
	$ebook_path = $_FILES['ebook_path']['name'];
	$ebook_path_type = $_FILES['ebook_path']['type'];
	
	if($ebook_image == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_ebook_image']="<span class='validate_error'>Please select the E-book Image</span>";
	}
	else
	{
		if(!($ebook_image_type=="image/pjpeg" || $ebook_image_type=="image/gif" || $ebook_image_type=="image/jpeg" || $ebook_image_type=="image/bmp" || $ebook_image_type=="image/png"))
		{
			$firstnameflag=1;
			$_SESSION['empty_ebook_image']="<font color='#FF0000' size=1>Please enter the Vaild Image</font>";
		}
		else
		{
			$uploads=$ebook_image;
			$uploads = date('YmdHis').rand(0,999).$uploads;
			$uploads1="../uploadimages/ebooks/images/".$uploads;
			move_uploaded_file($_FILES["ebook_image"]["tmp_name"],$uploads1);
			$new_ebook_image = "uploadimages/ebooks/images/".$uploads;
		}
		
	}
	if($ebook_path == '')
	{
		$firstnameflag=1;
		$_SESSION['empty_ebook_path']="<span class='validate_error'>Please select the E-Book File</span>";
	}
	else
	{
		if(!($ebook_path_type=="application/pdf" || $ebook_path_type=="application/zip" || $ebook_path_type=="application/rar"))
		{
			$firstnameflag=1;
			$_SESSION['empty_ebook_path']="<font color='#FF0000' size=1>Please select the Vaild E-Book File</font>";
		}
		else
		{
			$uploads=$ebook_path;
			$uploads = date('YmdHis').rand(0,999).$uploads;
			$uploads1="../uploadimages/ebooks/files/".$uploads;
			move_uploaded_file($_FILES["ebook_path"]["tmp_name"],$uploads1);
			$new_ebook_path = "uploadimages/ebooks/files/".$uploads;
		}
		
	}
	
	//*************END*************************//
	
	
	

	if($firstnameflag != 1)
	{
	
			$insert = mysql_query("insert into board(rank_name,board_width,board_depth,ebook_path,ebook_image,ebook_desc,epin_amount,board_income,board_status) values('$rank_name','$board_width','$board_depth','$new_ebook_path','$new_ebook_image','$ebook_desc','$epin_amount','$board_income','$board_status')");
			$_SESSION['success_flag']="<font color='#004000'><b>New Board added successfully</b></font>";
			echo '<meta http-equiv="refresh" content="0;url=board.php">';
			exit();
	}
	else	
	{
		$_SESSION['rank_name'] = $rank_name;
		$_SESSION['board_width'] = $board_width;
		$_SESSION['board_depth'] = $board_depth;
		$_SESSION['epin_amount'] = $epin_amount;
		$_SESSION['board_income'] = $board_income;
		$_SESSION['ebook_desc'] = $ebook_desc;
		
	
		$_SESSION['empty_pass']="<font color='#FF0000' size=1>Please check the below details.</font>";
		echo '<meta http-equiv="refresh" content="0;url=add_board.php">';
		exit();
	}

?>
