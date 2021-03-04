<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		
        // $pass = md5($pass);

        print_r($uname);
		
		$sql = "SELECT * FROM bookstorecreator WHERE email='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
		
		if ($result!='' && mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
		// 	print_r($row);
		// die();
            if ($row['email'] === $uname && $row['password'] === $pass) {
				// print_r($row['email']);
				// die();
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['userid'] = $row['userid'];
				header("Location: books.php");
		        exit();
		// 		print_r($result);
		// die();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
?>
