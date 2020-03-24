<!doctype html>
<link rel="stylesheet" type="text/css" href="styles.css" />
<?php
session_start();
	
    if (isset ($_SESSION['user_name']))
    {
	
    }				
    else {
	header ("location:login.php");
    }
?>  
    <div id="topBarDiv">
    <img id="topLogo" src="images/pageImages/Logo.png">
    <div id="logoText">MarioMart</div>
    <a id="logout" href="login.php">Log out </a>
    </div>
    <div id="whatIsGoingOn">
    
	<p id="questionOfTheDay"><br />Are you looking to buy or sell today?
    </p>
            <div id="main">
                
                <p><a class="buyOrSell" href="buyer_page/">Buy Items</a></p>
                <p><a class="buyOrSell" href="seller_page/">Sell Items</a></p>
            </div>
            

    </div>
</div>
</div>

<?php include 'view/footer.php'; ?>
