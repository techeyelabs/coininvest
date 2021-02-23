<!--Content Portion Start-->
<?php
error_reporting(0);
 if(!in_array("Settings",$permission)) 
 { 
 
 echo '<meta http-equiv="refresh" content="0; url=home.php" />';
 exit();
 
 }
	 
	
?>
 

<div id="primary_right">
				<div class="inner" style="width:70%">
				    
				    
				    
                <?php require 'include/top/coin_sell_management.php'; ?>

					 
					<hr />

				<!-- 	<h1>Site Settings</h1> -->
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
							        <p><strong><cufon class="cufon cufon-canvas" alt="Error!" style="width: 52px; height: 22px;">
							        <canvas width="70" height="23" style="width: 70px; height: 23px; top: -1px; left: -1px;"></canvas>
							        <cufontext>Error!</cufontext></cufon></strong><font size="1" color="#ff0000">'.$_SESSION['empty_pass'].'</font></p> 
						        </div> 
					            </div>';
						} 
						
                         
						
						?>
                        
               <form action="coin_upload.php" method='post' enctype="multipart/form-data" name='form1' >          
                        
					<fieldset>
					    
						<legend>Manage your Coin Information Settings</legend>
						
						
						<p>
						    <label>Coin Image:</label>
						    <input type="file" name="coin_image" />
						</p>
						
                        <p>
							<label>Title:</label>
							<input name="title" type="text" class="mf" id="title"  />
						</p>
						
						<p>
							<label>Description:</label>
                            <textarea rows="5" cols="50" class="mf"  name="description"></textarea>
                        </p>
                        
                        
                        <p>
							<label>Coin Price:</label>
                            <input name="coin_price" type="text" class="mf" id="coin_price"  />
						</p>
                        
						
						<p>
							<label>Asking Price:</label>
                            <input name="asking_price" type="text" class="mf" id="asking_price" />
						</p>
                        
                        <p>
							<label>Issued Year:</label>
                            <input name="issued_year" type="text" class="mf" id="issued_year"   />
						</p>
						
						
                 	    <p>
							<label>Issued Country:</label>
						    <input name="issued_country" type="text" class="mf" id="issued_country"    />
						</p>
                        
                        <p>
							<label>Manufacturer:</label>
						    <input name="manufacturer" type="text" class="mf" id="manufacturer"     />
						</p>
						
						<p>
							<label>Issued Nos.:</label>
							<input name="issued_nos" type="text" class="mf" id="issued_nos"   />
						</p>
                        
                        <p>
							<label>Quality:</label>
						    <input name="quality" type="text" class="mf" id="quality"    /> 
						</p>
						
                        <p>
							<label>Weight:</label>
							<input name="weight" type="text" class="mf" id="weight"    /> 
						</p>
                        
                        <p>
							<label>Diameter:</label>
							<input name="diameter" type="text" class="mf" id="diameter"    /> 
						</p>
                        
                        <p>
							<label>Thickness:</label>
                            <input name="thickness" type="text" class="mf" id="thickness"   /> 
                        </p>
                        
                        
                        <p>
                            <label>Status:</label>
                            <select>
                                <option value="active">Available</option>
                                <option value="deactive">Sold Out</option>
                            </select>
                        </p>
                        
                        
                        <div class="clearboth"></div>
						
					    <p align="center" style="padding-right:400px">
                            <input type="hidden" name="submit" value="1" />
                            <input class="button" type="submit" value="Submit" name="submit" />
                        </p>
                        
					    </fieldset>	
			    </form>
					    
					    
					    
					    
				
				
				
				
					    
		 
       
       
       
       
					    
					    
					    
				    </div> 
			</div>







