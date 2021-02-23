<?php

session_start();

require 'include/connect.php';
 ?>
<select name="sub_cat_id" >
							<option value="0">-Select-</option>
							<?
								$select_sub = mysql_query("select * from sub_category where sub_cat_status='on' and cat_id='".$_GET['id']."'");
								while($cat_info_sub = mysql_fetch_array($select_sub))
								{
									if($_SESSION['sub_cat_id'] == $cat_info['sub_cat_id'])
									{
										$_SESSION['cat_id'] = '';
							?>
								<option value="<?=$cat_info_sub['sub_cat_id']; ?>" selected="selected"><?=$cat_info_sub['sub_cat_name']; ?></option>
							<?
									} 
									else
									{
							?>
								<option value="<?=$cat_info_sub['sub_cat_id']; ?>"><?=$cat_info_sub['sub_cat_name']; ?></option>
							<?
									}
								}
							?>
							</select>
