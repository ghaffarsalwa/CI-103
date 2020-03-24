<?php
// Get IDs
$eid = $_POST['eid'];
$categoryID = $_POST['categoryID'];

// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM electronics
          WHERE eid = '$eid'";
$db->exec($query);

// display the Product List page
include('index_for_electonics.php');
?>