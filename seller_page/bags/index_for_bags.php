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
            $categoryID = 3;
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
    $query = "SELECT * FROM bags
              WHERE categoryID = $categoryID
              ORDER BY bagid";
    $bags = $db->query($query);
    
?>

<html>

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
        
        <h1>Products List</h1>

        <div id="sidebar">
            <!-- display a list of categories -->
            <h2>Categories</h2>
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
                    <th>Bag Name</th>
                    <th>Description</th>                                    
                    <th class="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($bags as $bag) : ?>
                <tr>                    
                    <td><?php echo $bag['codeName']; ?></td>
                    <td><?php echo $bag['bagName']; ?></td>
                    <td><?php echo $bag['description']; ?></td>
                    <td class="right"><?php echo $bag['listPrice']; ?></td>
                    <td><form action="delete_bags.php" method="post"
                              id="delete_bags_form">
                        <input type="hidden" name="bagid"
                               value="<?php echo $bag['bagid']; ?>" />
                        <input type="hidden" name="categoryID"
                               value="<?php echo $bag['categoryID']; ?>" />
                        <input type="submit" value="Delete" />
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><a href="add_bags_form.php">Add Bags</a></p>
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