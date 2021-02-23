<style type="text/css">
<!--
.style1 {font-size: small}
-->
</style>

<div class="content_part">
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="89%" align="left" class="yhere"><span class="title">You are here:</span> <span>Preferences</span><span>Splash Pages</span> Create Splash Pages</td>
          <td width="11%" align="right" class="backlink"><a href="javascript: history.go(-1)">Back</a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <!--<tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="2%" class="htip_topl"></td>
            <td width="96%" class="htip_topbg"></td>
            <td width="2%" class="htip_topr"></td>
          </tr>
          <tr>
            <td colspan="3" class="htip_bg"><span>Help Tips :</span> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut </td>
          </tr>
          <tr>
            <td class="htip_botl"></td>
            <td class="htip_botbg"></td>
            <td class="htip_botr"></td>
          </tr>
      </table></td>
    </tr>-->
    <? if($_SESSION['succ_dir']) { 
	?>
	 
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="success_topl"></td>
          <td class="success_topbg"></td>
          <td class="success_topr"></td>
        </tr>
        <tr>
          <td colspan="3" class="success_bg"> <? echo $_SESSION['succ_dir']; $_SESSION['succ_dir']=''; ?></td>
        </tr>
        <tr>
          <td class="success_botl"></td>
          <td class="success_botbg"></td>
          <td class="success_botr"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <?
    } ?>

	 <? if($_SESSION['empty_pass'])  { ?>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="error_topl"></td>
          <td class="error_topbg"></td>
          <td class="error_topr"></td>
        </tr>
        <tr>
          <td colspan="3" class="error_bg"><? echo $_SESSION['empty_pass']; $_SESSION['empty_pass']='';?></td>
        </tr>
        <tr>
          <td class="error_botl"></td>
          <td class="error_botbg"></td>
          <td class="error_botr"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <?
  } ?>
   <? if($_SESSION['success_flag']) { 
	?>
	 
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="success_topl"></td>
          <td class="success_topbg"></td>
          <td class="success_topr"></td>
        </tr>
        <tr>
          <td colspan="3" class="success_bg"> <? echo $_SESSION['success_flag']; $_SESSION['success_flag']=''; ?></td>
        </tr>
        <tr>
          <td class="success_botl"></td>
          <td class="success_botbg"></td>
          <td class="success_botr"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <?
    } ?>
    <tr>
      <td align="left" valign="top">
      <form name="fm" method="post" action="spage_validate.php" enctype="multipart/form-data">
      <table id="alerts" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="2%" class="lbox_topl">&nbsp;</td>
          <td width="96%" class="lbox_topbg">Create a New Splash Page</td>
          <td width="2%" class="lbox_topr">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="3" align="center" class="lbox_contentbg"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" align="right" class="formtext1"><span class="redstar">*</span> = Required Fields</td>
                  </tr>
                  <tr>
                  <td align="left" class="formtext2" valign="top" colspan="2"> <span class="redstar">*</span>Note : API for Creating FORM for Lead Capture
				  <br /><br />&lt;form name = "form1" action="../../leadcap.php" /&gt;
				  <br /><br />&lt;input name="first_name" type="text" /&gt;
				  <br /><br />&lt;input name="last_name" type="text" /&gt;
				  <br /><br />&lt;input name="country" type="text" /&gt;
				  <br /><br />&lt;input name="email_id" type="text" /&gt;
				  <br /><br />&lt;input name="ip_add" type="hidden" value="&lt;?=$_SERVER['REMOTE_ADDR']; ?&gt;" /&gt;
				  <input type="hidden" name="ip_add" value="<?=$_SERVER['REMOTE_ADDR']; ?>">
				  </td>
                  
                </tr>
				 <tr>
                  <td align="left" class="formtext2" valign="top" colspan="2" style="text-decoration:blink"> <span class="redstar">Please Use above the tags for particular Labels in Splash Page before add the body content</span>
				  </td>
                  
                </tr>
                  <!--<tr>
                  <td align="right" class="formtext2" valign="top"> <span class="redstar">*</span>Page Name :</td>
                  <td align="left" class="formtext2"><input name="page_name" type="text" class="tbox1" id="plan_name" value="<?=$select_page['page_name']; ?>" /> 
                    <span class="style1">(Ex. sample.php)</span><br />
                  <? if($_SESSION['empty_page_name']) { echo $_SESSION['empty_page_name']; $_SESSION['empty_page_name']=''; } ?></td>
                </tr>-->
              <!--  <tr>
                  <td align="right" class="formtext2"> <span class="redstar">*</span>Site Logo :</td>
                  <td align="left" class="formtext2"><input name="setup" type="file" class="tbox1" id="setup" /> 
                  <br /><img src="../<?=$fetch['site_logo']; ?>" width="154px" height="68px" border="0" alt="Logo" /></td>
                </tr>
             -->
			 <? $fetch=mysql_query("select * from language_details where 	status = 'active'"); ?>
			 <tr>
                    <td align="right" class="formtext2"><span class="redstar">*</span> Language :</td>
                    <td align="left" class="formtext2"><select name="language" class="tbox1" id="language" />
                        <option value="">Select</option>
                        <?php while($row=mysql_fetch_array($fetch)) { ?>
                        <option value="<?php echo $row['language_id'] ?>"><?php echo $row['language_name'] ?></option>
                        <?php } ?>
                        </select></td>
                  </tr>
                <tr>
                  <td align="right" class="formtext2"valign="top"> Page Title:</td>
                  <td align="left" class="formtext2"><input name="page_title" type="text" class="tbox1" id="month_sub" value="<?=$select_page['page_title']; ?>"  />
                    <span class="style1">                  Meta Title for the New Page                    </span><br />
                  <? if($_SESSION['empty_page_title']) { echo $_SESSION['empty_page_title']; $_SESSION['empty_page_title']=''; } ?></td>
                </tr>
                
                <tr>
                  <td align="right" class="formtext2"valign="top">Meta Content:</td>
                  <td align="left" class="formtext2"><textarea name="meta_content" cols="50" rows="4" class="txt_area350" id="meta_content" ><?=$select_page['meta_content']; ?></textarea> 
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?></td>
                </tr>
                
                <tr>
                  <td align="right" class="formtext2"valign="top"> Meta Keyword :</td>
                  <td align="left" class="formtext2"><textarea name="meta_key" cols="50" rows="4" class="txt_area350 " id="meta_key" ><?=$select_page['meta_key']; ?></textarea> 
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?></td>
                </tr>
                
                 <tr>
                  <td align="right" class="formtext2"valign="top"> Css Files :</td>
                  <td align="left" class="formtext2"><input type="file" name="css_file" id="css_file" value=""/>&nbsp;&nbsp;<span class="style1"> Should be in .css format  </span><br /></td>
                </tr>
				
				<tr>
                  <td align="right" class="formtext2"valign="top"> Images :</td>
                  <td align="left" class="formtext2"><input type="file" name="images_file" id="images_file" value=""/>&nbsp;&nbsp;<span class="style1">Should be in .zip format</span></td>
                </tr>
                
                  <!--<tr>
                  <td align="right" class="formtext2"><span class="redstar">*</span> Images Files :</td>
                  <td align="left" class="formtext2"><input type="file" name="js_file" id="js_file" value=""/></td>
                </tr>-->
               
                  <tr>
                  <td align="right" class="formtext2"valign="top"><span class="redstar">*</span> Body Content :</td>
                  <td align="left" class="formtext2"><textarea name="bodycontent" id="body" cols="50" rows="4" class="txt_area350 "><?=$select_page['content']; ?></textarea></td>
                </tr>
               
                <tr>
                  <td align="right" class="formtext2" valign="top"><span class="redstar">*</span> Status :</td>
                  <td align="left" class="formtext2"><input type="radio" name="status" value="active" checked="checked" />Active&nbsp;&nbsp;<input type="radio" name="status" value="suspend" />Supend&nbsp;&nbsp;
                  <br />
                  <? if($_SESSION['empty_month_sub']) { echo $_SESSION['empty_month_sub']; $_SESSION['empty_month_sub']=''; } ?></td>
                </tr>
              
                <tr>
                  <td align="right" class="formtext2">&nbsp;</td>
                  <td align="left" class="formtext2"><input type="hidden" name="submit" value="1" /><input type="image" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('update','','images/update_bttn_hov.gif',1)" src="images/update_bttn.gif" alt="Update" name="button" width="73" height="19" border="0" id="update" /></a></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            </table></td>
        </tr>
        <tr>
          <td class="lbox_botl">&nbsp;</td>
          <td class="lbox_botbg">&nbsp;</td>
          <td class="lbox_botr">&nbsp;</td>
        </tr>
      </table>
      </form>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
</div>
<!--Content Portion End-->