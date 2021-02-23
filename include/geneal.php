<?php
class Gene
{
	var $tmp = array();
	
	function display($id,$pos)
	{
			
		if(!empty($id))
		{
		//	echo "select * from downlines where member_id=$id";
		$sql_query_fetch=mysql_fetch_array(mysql_query("select * from members where username='$id'"));
		$member_id=$sql_query_fetch['member_id'];
		$sql=mysql_query("select * from downlines where member_id=$member_id");
		$exe=mysql_fetch_array($sql);	
		if($pos=="left")
		{
			$id=$exe['left_id'];
		}
		else if($pos='right')
		{
			$id=$exe['right_id'];
		}	
		$this->tmp = array_merge($this->tmp,array($id));
		}
		
//		echo "asd :	".$id;

		if($id > 0)
		{
		//echo "select * from members_table where member_id=$id";
		$sql=mysql_query("select * from members where member_id=$id");
		$fetch=mysql_fetch_array($sql);
		$name=$fetch['username'];
		
		return $name;
		}
		else
		{
			$dd="";
			return $dd; 
		}

	}
	
}



?>