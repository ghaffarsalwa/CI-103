<?php
require('database.php');
$query = 'SELECT *
          FROM categories
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
    <div id="bookUploadPage">


        <div id="main">
            <h1>Add Books</h1>
            <form action="add_books.php" method="post"
                  id="add_books_form">

                <label>Category:</label>
                <select name="categoryID">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
    
                <label>Code:  "A unique abbreviation"</label>
                <input type="input" name="code" />
                <br />
                
                
                <label>Subject:  "Ex. Biology"</label>
                <input type="input" name="subject" />
                <br />
                
                <label>ISBN:</label>
                <input type="input" name="ISBN" />
                <br />
                
                <label>Book Name:</label>
                <input type="input" name="bookName" />
                <br />
                
                <label>Description:</label>
                <input type="input" name="description" />
                <br />
                
                <label>Course: </label>
                <input type="input" name="course" />
                <br />

                <label>List Price:</label>
                <input type="input" name="listPrice" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Add Book" />
                <br />
            </form>
            <p id="backButton"><a href="index.php">Back</a></p>
        </div><!-- end main -->

        <div id="footer">
            <p>
                &copy; <?php echo date("Y"); ?> Mario Mart, Inc.
            </p>
        </div>

    </div><!-- end page -->
</body>
</html>