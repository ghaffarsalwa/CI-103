<?php
session_start();
	
    if (isset ($_SESSION['user_name']))
    {
	echo '<H1 align="center"> Mario Mart Seller Page</H1> '.$_SESSION['user_name']  ; 
	echo '<a href="../logout.php">Log out </a> <br> ';
    }				
    else {
	header ("location:login.php");
    }
?> 


<?php
    require_once('database.php');

    // Get category ID
    if(!isset($categoryID)) {
        $categoryID = $_GET['categoryID'];
        if (!isset($categoryID)) {
            $categoryID = 1;
        }
    }

    // Get name for current category
    $query = "SELECT * FROM categories
              WHERE categoryID = $categoryID";
    $category = $db->query($query);
    $category = $category->fetch();
    $categoryName = $category['categoryName'];

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $categories = $db->query($query);

    // Get products for selected category
    $query = "SELECT * FROM electronics
              WHERE categoryID = $categoryID
              ORDER BY eid";
    $electronics = $db->query($query);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>Mariomart</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Seller Page</h1>
    </div>
        
    <div id="main">

        

        <div id="sidebar">
            <!-- display a list of categories -->
           
            <ul class="nav">
            <?php foreach ($categories as $category) : ?>
                <li>
                <a href="?categoryID=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
            
            <div id="content">
            <!-- display a table of products -->
            
            <table>
                
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>                                    
                    <th class="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($electronics as $electronic) : ?>
                <tr>                    
                    <td><?php echo $electronic['eCode']; ?></td>
                    <td><?php echo $electronic['eName']; ?></td>
                    <td><?php echo $electronic['description']; ?></td>
                    <td class="right"><?php echo $electronic['listPrice']; ?></td>
                    <td><form action="delete_electrnics.php" method="post"
                              id="delete_electronics_form">
                        <input type="hidden" name="eid"
                               value="<?php echo $electronic['eid']; ?>" />
                        <input type="hidden" name="categoryID"
                               value="<?php echo $electronic['categoryID']; ?>" />
                        <input type="submit" value="Delete" />
                    </form></td>
                </tr>
                <?php endforeach; ?>
        
            </table>
            <p><a href="add_electronics_form.php">Add Electronics</a></p>
            <p><a href="category_list.php">List Categories</a></p>
            </div>
    </div>

    <div id="footer">
        <p>
            &copy; <?php echo date("Y"); ?> Mariomart, Inc.
        </p>
    </div>

    </div><!-- end page -->
</body>
</html>