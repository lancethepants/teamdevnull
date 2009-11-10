<html>
<head>

<style>
/*
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
*/
</style>

<link href="../library/css/style.css" type="text/css" rel="stylesheet">

</head>
<body>

<?php
	
	/*require_once("/home/devnull/teamdevnull-read-only/src/library/classes/DAL.php"); FOR PROD*/
	require_once("../includes.php");
	$db = new DAL();
	//	$result = $db->execute("SELECT FROM"); FOR SELECTs
	// $db->update("query"); FOR UPDATEs*/ 
	
	
	
 ?>


<center>

<div class="content">

	<div class="header">
	
		<img src="../library/images/title.png" class="title_bar" />
		
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
					$pass = md5($_POST['userpass']);
					$cQuestion = $_POST['cQuestion'];
					$cAnswer = $_POST['cAnswer'];
					$city = $_POST['city'];
					$phone = $_POST['hphone'];
					$email = $_POST['emailAddress'];
					$mobile = $_POST['mphone'];
					if (isset($_POST['sms']))
					{
						$sms = 1;
					}
					else
					{
						$sms = 0;
					}
					$degree = $_POST['track'];
					$mobileprovider = $_POST['provider'];
					$campus = $_POST['campus'];
					$referral = $_POST['firstHearAbout'];

					$conn = mysql_connect('localhost','root','');
					mysql_select_db('3750-09devnull',$conn);
					
					if ($conn)
					{
						$sql = "INSERT INTO user (UserCategoryID, UserLogin, UserPassword, UserChallengeQuestion, UserChallengeQuestionAnswer) VALUES(1, '$login', '$pass', '$cQuestion', '$cAnswer')";
						$result = $db->update($sql);
						//$result = mysql_query($sql, $conn);
						$userid = mysql_insert_id();
						if ($result)
						{
							
							$sql = "INSERT INTO userdetail (UserID, UserDetailFirst,UserDetailLast,UserDetailCity,UserDetailHomePhone,UserDetailEmail,UserDetailMobilePhone,UserDetailMobileSMS,DegreeCategoryID,MobileProviderCategoryID,CampusCategoryID,RefferalCategoryID) VALUES ($userid, '$fname', '$lname', '$city', '$phone', '$email', '$mobile', $sms, $degree, $mobileprovider, $campus, $referral)";
							$result = $db->update($sql);
							//$result = mysql_query($sql, $conn);
							echo 'Data inserted';
						}
						else
						{
							echo 'No data inserted';
						}
					}		
					
			
				}

			?>

			<table border="0">
            <tr>
            	<th><h3 style="text-decoration:underline;">Registration Complete!</h3></th>
            </tr>
            <tr>
            	<td style="font-style:italic;font-size:12px;">
                Thank you for registering, Joe! Your registration details have been<br />
                sent to joe@weber.edu. You may now login and utilize the site's tools<br />
                by entering your login information at the top-right of the screen. If you have<br />
                any questions, please <a href="">email</a> the administrator.
                </td>
            </table>
		</div>
			
	</div>

</div>

</center>

</body>
</html>
