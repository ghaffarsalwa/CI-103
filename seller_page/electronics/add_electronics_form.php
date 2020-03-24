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
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">
        <div id="header">
            <h1>Electronics Organizer</h1>
        </div>

        <div id="main">
            <h1>Add Electronics</h1>
            <form action="add_electrnics.php" method="post"
                  id="add_electronics_form">

                <label>Category:</label>
                <select name="categoryID">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                
                <label>Code:</label>
                <input type="input" name="code" />
                <br />
                
                <label>Name:</label>
                <input type="input" name="eName" />
                <br />
                
                <label>Description:</label>
                <input type="input" name="description" />
                <br />

                <label>List Price:</label>
                <input type="input" name="listPrice" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Add Electronic" />
                <br />
            </form>
            <p><a href="index_for_electonics.php">View Electronics List</a></p>
        </div><!-- end main -->

        <div id="footer">
            <p>
                &copy; <?php echo date("Y"); ?> Mario Mart, Inc.
            </p>
        </div>

    </div><!-- end page -->
</body>
</html>