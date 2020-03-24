<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $categories = $db->query($query);
?>

<html>

<!-- the head section -->
<head>
    <title>Mario Mart</title>
    <link rel="stylesheet" type="text/css" href="sellerStyles.css" />
</head>

<!-- the body section -->
<body>
<div id="topBarDiv">
    <img id="topLogo" src="../images/pageImages/Logo.png">
    <div id="logoText">MarioMart</div>
    <a id="logout" href="../login.php">Log out </a>
    </div>
    <div id="page">

    <div id="header">
        <h1>Products</h1>
    </div>

    <div id="main">

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
    <!-- add code for the rest of the table here -->
    <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?php echo $category['categoryName']; ?></td>
                    <td><form action="delete_category.php" method="post"
                              id="delete_product_form">
                        <input type="hidden" name="categoryID"
                               value="<?php echo $category['categoryID']; ?>" />
                        <input type="submit" value="Delete" />
                    </form></td>
                </tr>
    <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
    
    <!-- add code for the form here -->
    <form action="add_category.php" method="post"
                  id="add_category_form">

                

                <label>Name:</label>
                <input type="input" name="name" />
                
                <input type="submit" value="Add category" />
                <br />
    </form>
    
    <br />
    <p><a href="index.php">List Products</a></p>

    </div> <!-- end main -->

    <div id="footer">
        <p>
            &copy; <?php echo date("Y"); ?> Mario Mart, Inc.
        </p>
    </div>

    </div><!-- end page -->
</body>
</html>