<?php
session_start();
if(isset($_SESSION['username'])){
	echo "<h3>Welcome - " . $_SESSION['username'] . "</h3>";
	echo "<br /></br /> <a href = 'insert.php' class='btn btn-success'>Insert Record</a>";
	
	echo "<br /></br /> <a href = 'view.php' class='btn btn-warning'>View Record</a>";

	echo "<br /></br /> <a href = 'logout.php' class='btn btn-danger'>Logout</a>";

}
else{
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<body>

</body>
</html>