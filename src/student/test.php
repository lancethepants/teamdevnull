<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	$conn = mysql_connect('localhost','root','');
	mysql_select_db('3750-09devnull',$conn);
	if ($conn)
	{
		echo "Good!";
		$sql = "INSERT INTO usercategory VALUES('2', 'admin')";
		$result = mysql_query($sql, $conn);
		if ($result)
		{
			echo 'Data inserted';
		}
		else
		{
			echo 'No data inserted';
		}
			
	}
	else
	{
		echo "Bad!";
	}
?>
test
</body>
</html>