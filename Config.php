<?php
	$server = "localhost";
	$Email="root";
	$Password='';
	$Secret="";
	$database="feedback";

	$con = mysqli_connect($server, $Email, $Password, $Secret, $database);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $Email = $_POST['Email'];  
    $Password = $_POST['Password'];  
    $Secret = $_POST['Secret'];  
      
        //to prevent from mysqli injection  
        $Email = stripcslashes($Email);  
        $Password = stripcslashes($Password); 
        $Secret = stripcslashes($Secret);  
        $Email = mysqli_real_escape_string($con, $Email);  
        $Password = mysqli_real_escape_string($con, $Password);
        $Secret = mysqli_real_escape_string($con, $Secret);  
        $sql = "select *from login where Email = '$Email' and Password = '$Password' and Secret='$Secret'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
?>
