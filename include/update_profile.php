<?PHP



	if(isset($_POST['submit']))

	{

		$ans = $_POST['txtanswer'];

		

		$select = mysql_num_rows(mysql_query("select * from members where member_id=$userid and answer='".$ans."'"));

		if($select > 0)

		{

			$_SESSION['update_profile'] = 1;

			echo '<meta http-equiv="refresh" content="0;url=profile.php?mode=ac">';

			exit();

		}

		else

		{

			$amount_flag =1;

		}

	}



?>