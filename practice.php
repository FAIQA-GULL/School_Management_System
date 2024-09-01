<!DOCTYPE html>
<html>
<head>
	<title>prectice page</title>

</head>
<body>
<?php

if (isset($_POST['add'])) {
	# code...
	echo $name = $_POST['name'];
	echo 'br ';

	echo  $pass = $_POST['password'];
	echo 'br ';
	echo  $select = $_POST['selectMe'];

}





?>
</body>
</html>