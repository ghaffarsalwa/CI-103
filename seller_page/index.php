<?php
session_start();
	
    if (isset ($_SESSION['user_name']))
    {
	
	echo '<br> ';
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
    $query = "SELECT * FROM books
              WHERE categoryID = $categoryID
              ORDER BY bookID";
    $books = $db->query($query);
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>Mariomart</title>
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
        <div id="options">
        <p><a href="add_books_form.php">Add Books</a></p>
        <p><a href="category_list.php">List By Category</a></p>
        <p><a href="../index.php">Back</a></p>
        </div>
        <h1>My Products</h1>
        <div id="content">
        
            <!-- display a table of products -->
            <table>
                
                <tr>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>ISBN</th>
                    <th>Book Name</th>
                    <th>Description</th>
                    <th>Course</th>                                    
                    <th class="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                
                <?php foreach ($books as $book) : ?>
                <tr>                 
                    <td><?php echo $book['code']; ?></td>
                    <td><?php echo $book['subject']; ?></td>
                    <td><?php echo $book['ISBN']; ?></td>
                    <td><?php echo $book['bookName']; ?></td>
                    <td><?php echo $book['description']; ?></td>
                    <td><?php echo $book['course']; ?></td>
                    <td class="right"><?php echo $book['listPrice']; ?></td>
                    <td><form action="delete_books.php" method="post"
                              id="delete_books_form">
                        <input type="hidden" name="bookID"
                               value="<?php echo $book['bookID']; ?>" />
                        <input type="hidden" name="categoryID"
                               value="<?php echo $book['categoryID']; ?>" />
                        <input type="submit" value="Delete" />
                    </form></td>
                </tr>
                <?php endforeach; ?>
        </table>
        
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