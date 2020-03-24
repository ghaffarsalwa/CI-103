<!doctype html>
<html>


<head>

<link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body>

<?php

require_once("connection.php");
		 		 
    if (isset($_POST['register']))
	{
            $first_name= $_POST['first_name'];
            $last_name= $_POST['last_name'];
            $email_address= $_POST['email_address'];
            $user_name= $_POST['user_name'];
            $password= $_POST['password'];

            
		if ($first_name !="" and $last_name !="" and $email_address !="" and $user_name !="" and $password !="") 
                    {
			$q="INSERT INTO `user`(`id`, `first_name`, `last_name`, `email_address`, `user_name`, `password`)
                            VALUES('', '".$first_name."', '".$last_name."', '".$email_address."',  '".$user_name."', '".$password."')";
					
				if (mysqli_query($con, $q)){
                                    header("location:login.php");
				}
				else{
                                    echo $q="" ;
				}
			}
			else{ 
				echo "PLEASE FILL IN ALL THE BOXES" ;
			}
	}

?>
<body>
<div id="topBarDiv">
    <img id="topLogo" src="images/pageImages/Logo.png">
    <div id="logoText">MarioMart</div>
    </div>
<div id="loginMain">

<h2 align="center"> Registration</h2> 
<form method="post">
First Name:<br>
<input class="inputForLoginPage" type="text" name="first_name" placeholder="First Name" />  <br><br>

Last Name:<br>
<input class="inputForLoginPage" type="text" name="last_name" placeholder="Last Name" /> <br><br>

Email Address:<br>
<input class="inputForLoginPage" type="text" name="email_address" placeholder="Email Address" /> <br><br>

Username:<br>
<input class="inputForLoginPage" type="text" name="user_name" placeholder="user name" />    <br><br>

Password:<br>
<input class="inputForLoginPage" type="text"  name="password" placeholder="password"  />     <br><br>


<input class="inputForLoginPage" type="submit" name="register" value="Register" />     

<p> Already a User? <a href= "login.php"><b>Log in</b></a></p>

</form>
</div>


</body>

</html>