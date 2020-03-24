<?php
// Get IDs
$bagid = $_POST['bagid'];
$categoryID = $_POST['categoryID'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM bags
          WHERE bagid = '$bagid'";
$db->exec($query);

// display the Product List page
include('index_for_bags.php');
?>