<?php
// Get IDs
$bookID = $_POST['bookID'];
$categoryID = $_POST['categoryID'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM books
          WHERE bookID = '$bookID'";
$db->exec($query);

// display the Product List page
include('index.php');
?>