<?PHP session_start();

 error_reporting(0);

 require 'include/connect.php';

$status = $_GET['status'];

	if($status != '')
	{
		$select=mysql_query("select * from members_table where member_status ='".$status."'");
	}
	else
	{
		$select=mysql_query("select * from members_table");
	}
?>
	<select name="txtmmember[]" multiple="multiple" size="7" style="width:200px">
	<option value="all" selected="selected">All</option>
<? if(mysql_num_rows($select) > 0)
	{
	while($fetch=mysql_fetch_array($select))
	{
?>
		<option value="<?=$fetch['mail_id']; ?>"><?=$fetch['mail_id']; ?></option>
<?
	}
	}
?>
	</select>