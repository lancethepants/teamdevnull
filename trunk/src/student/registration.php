<html>
<head>

<style>

body
{
	background: #999;
	margin: 0px;
	height:768px;
}

.content
{
	width: 1024px;
	background: #fff;
	height: 100%;
	border-left: 1px solid #333;
	border-right: 1px solid #333;
}

.header
{
	background: url('pic_bg.jpg') no-repeat;
	width: 100%;
	height: 314px;
	text-align: left;
}

.title_bar
{
	position: absolute;
	z-index: 1;
}

.header_content
{
	height: 274px;
	padding-top: 40px;
	border-bottom: 1px solid #ccc;
}

.menu
{
	float: left;
	width: 240px;
	height: 100%;
	background: #fff;
	opacity: .8;
}

.post_it
{
	float: right;
	width: 400px;
	height: 100%;
	background: url('post_it.png') no-repeat;
	background-position: center;
}

.body_content
{
	padding: 25px;
}

.login_box
{
	position: absolute;
	width: 1024px;
	padding-top: 9px;
	text-align: right;
	z-index: 2;
}

.login_input
{
	width: 180px;
	background: #6D4D7A;
	border: 0px;
	color: #fff;
	padding: 3px;
	margin-right: 8px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
}

input
{
	border: solid 1px #85b1de;
    background-color: #EDF2F7;
}

form 
{
	border: 1px solid #666699;
	padding: 5px;
}
</style>
</head>
<body>

<?php
	
	/*require_once("/home/devnull/teamdevnull-read-only/src/library/classes/DAL.php");*/
	require_once("/library/classes/DAL.php");

	$db = new DAL();
	/*
	$result = $db->execute("SELECT FROM");
	*/
	/*$db->update("query");*/
	
	
	
 ?>

<center>

<div class="content">

	<div class="header">
	
		<img src="title.png" class="title_bar" />
		
		<div class="login_box">
		
			<input type="text" class="login_input" /><input type="password" class="login_input" />
		
		</div>
		
		<div class="header_content">
		
			<div class="menu" align="center" style="font-size:12px;"><br /><Br />
            <a href="">Example</a><br />
			<a href="">Example</a><br />
            <a href="">Example</a><br />
            <a href="">Example</a><br />
            </div>
			<div class="post_it"></div>
		
		</div>
		
		<div class="body_content" align="center">
        	
        	<?php

				if (isset($_POST['submitRegistration']))
				{
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$login = $_POST['username'];
					$pass = $_POST['userpass'];
					$cQuestion = $_POST['cQuestion'];
					$cAnswer = $_POST['cAnswer'];
					$city = $_POST['city'];
					$phone = $_POST['hphone'];
					$email = $_POST['emailAddress'];
					$mobile = $_POST['mphone'];
					if (isset($_POST['sms']))
					{
						$sms = 'y';
					}
					else
					{
						$sms = 'n';
					}
					$degree = $_POST['track'];
					$mobileprovider = $_POST['provider'];
					$campus = $_POST['campus'];
					$referral = $_POST['firstHearAbout'];
					/*
					$conn = mysql_connect('localhost','root','')
					
					$userid = mysql_insert_id();
					*/
					
				}


			?>
        
			<form action="registrationConfirmed.php" method="post">
            <table border="0" cellspacing="0" cellpadding="3">
            <tr valign="top">
                <th colspan="2"><h3 style="text-decoration:underline;">Registration</h3></th>
            </tr>
            <tr valign="top">
            	<td>
                <table border="0" cellspacing="0" cellpadding="3">                
                <tr>
                    <td style="font-style:italic;font-size:14px;">First Name:</td>
                    <td><input type="text" name="fname" /></td>
                </tr>
                <tr>
                    <td style="font-style:italic;font-size:14px;">Last Name:</td>
                    <td><input type="text" name="lname" /></td>
                </tr>      
                <tr>
                    <td style="font-style:italic;font-size:14px;">Home Phone:</td>
                    <td><input type="text" name="hphone" /></td>
                </tr>
                <tr>
                    <td style="font-style:italic;font-size:14px;">City:</td>
                    <td><input type="text" name="city" /></td>
                </tr>
                <tr valign="top">
                    <td style="font-style:italic;font-size:14px;">Mobile Phone:</td>
                    <td style="font-style:italic;font-size:14px;">
                        <input type="text" name="mphone" /><br />
                        Provider: <Select name="provider">
		                <?php
							//$conn = mysql_connect('localhost','root','');
							//mysql_select_db('3750-09devnull',$conn);
							
							$sql = "SELECT * FROM mobileprovidercategory";
							$result = $db->execute($sql);
							//$result = mysql_query($sql,$conn);
							while ($row = mysql_fetch_array($result))
							{									
								echo "<option value='".$row['MobileProviderCategoryID']."'>".$row['MobileProviderCategoryDesc']."<br />";

							}
						?>
                        </select>
                       <br />
                        <input type="checkbox" name="sms" />Receive announcements via SMS
                    </td>
                </tr>
                <tr>
                    <td style="font-style:italic;font-size:14px;">E-Mail Address:</td>
                    <td><input type="text" name="emailAddress" /></td>
                </tr>
                <tr>
                    <td style="font-style:italic;font-size:14px;">Desired Username:</td>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <td style="font-style:italic;font-size:14px;">Password:</td>
                    <td><input type="password" name="userpass" /></td>
                </tr>               
                <tr>
                    <td style="font-style:italic;font-size:14px;">Challenge Question:</td>
                    <td><input type="text" name="cQuestion" /></td>
                </tr>               
                <tr>
                    <td style="font-style:italic;font-size:14px;">Challenge Answer:</td>
                    <td><input type="text" name="cAnswer" /></td>
                </tr>               

                </table>
                </td>
                <td>
                	<table border="0" cellspacing="0" cellpadding="3">
                    <tr valign="top">
                        <td style="font-style:italic;font-size:14px;">Degree Track:</td>
                        <td style="font-style:italic;font-size:14px;">
                        	<?php
								//$conn = mysql_connect('localhost','root','');
								//mysql_select_db('3750-09devnull',$conn);
								$sql = "SELECT * FROM degreecategory";
								$result = $db->execute($sql);
								//$result = mysql_query($sql,$conn);
								while ($row = mysql_fetch_array($result))
								{									
									echo "<input type='radio' name='track' value='".$row['DegreeCategoryID']."' checked='true'>".$row['DegreeCategoryDesc']."<br />";									
								}	
							?>
                            <!--
                            <input type="radio" name="track" value="se" checked="true" />Software Engineer<br />
                            <input type="radio" name="track" value="net" />Network Administration<br />
                            <input type="radio" name="track" value="custom" />Customized<br />
                            -->
                        </td>
	                </tr>
    	            <tr valign="top">
        	            <td style="font-style:italic;font-size:14px;">Your Main Campus:</td>
            	        <td style="font-style:italic;font-size:14px;">
	                        <?php
								//$conn = mysql_connect('localhost','root','');
								//mysql_select_db('3750-09devnull',$conn);
								$sql = "SELECT * FROM campuscategory";
								$result = $db->execute($sql);
								//$result = mysql_query($sql,$conn);
								while ($row = mysql_fetch_array($result))
								{									
									echo "<input type='radio' name='campus' value='".$row['CampusCategoryID']."' checked='true'>".$row['CampusCategoryDesc']."<br />";									
								}	
							?>
	                        
	                    </td>
	                </tr>
                    <tr valign="top">
        	            <td style="font-style:italic;font-size:14px;">How did you FIRST hear about us:</td>
            	        <td style="font-style:italic;font-size:14px;">
	                        <?php
								//$conn = mysql_connect('localhost','root','');
								//mysql_select_db('3750-09devnull',$conn);
								$sql = "SELECT * FROM refferalcategory";
								$result = $db->execute($sql);
								//$result = mysql_query($sql,$conn);
								while ($row = mysql_fetch_array($result))
								{									
									echo "<input type='radio' name='firstHearAbout' value='".$row['RefferalCategoryID']."' checked='true'>".$row['RefferalCategoryDesc']."<br />";									
								}	
							?>

	                        
	                    </td>
	                </tr>
                    <tr valign="top">
        	            <td style="font-style:italic;font-size:14px;">Other places you heard about us:</td>
            	        <td style="font-style:italic;font-size:14px;">
	                        <input type="checkbox" name="otherHearAbout" value="friend"/>Friend<br />
                            <input type="checkbox" name="otherHearAbout" value="flyer"/>Flyer/Mail<br />
                            <input type="checkbox" name="otherHearAbout" value="teacher"/>Teacher<br />
                            <input type="checkbox" name="otherHearAbout" value="Other">Other: <input type="text" name="otherHearOther" />
	                    </td>
	                </tr>
                    </table>
                </td>
            <tr>
            	<th colspan="2"><input type="submit" value="Register" name="submitRegistration"></th>
            </tr>
            </table>
            </form>
            
		</div>
			
	</div>

</div>
test
</center>

</body>
</html>
