<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="styles.css" />



<body>
<div id="topBarDiv">
    <img id="topLogo" src="images/pageImages/Logo.png">
    <div id="logoText">MarioMart</div>
    </div>
<div id="loginMain">

<?php 
			session_start();
			require_once("connection.php");


		if (Isset($_POST['login'])){
			$user_name = $_POST['user_name'];
			$password =$_POST['password'];
			
			$q='SELECT * FROM `user` where `user_name` ="'.$user_name.'"  and `password` = "'.$password.'"';
			$r = mysqli_query($con, $q);
			
			if (mysqli_num_rows($r) > 0){
				
				$_SESSION['user_name']= "";
				
				
				header("location:index.php");				
			}else {
				echo 'YOUR USERNAME AND PASSWORD DO NOT MATCH<BR><BR>PLEASE TRY AGAIN';
			}
			
		}


?>






<h2 style="text-align:center"> Login </h2> 
<form method="post">
User Name:<br>
<input class="inputForLoginPage" type="text" name="user_name" placeholder="user name" required /> <br><br>
Password:<br>
<input class="inputForLoginPage" type="password" name="password" placeholder="password" /> <br></br>
<input class="inputForLoginPage" type="submit" name="login" value="Login" />   <br><br>
<a href="registration.php"> Create an account </a> <br><br>


</form>
 </div>

</body>

</html>