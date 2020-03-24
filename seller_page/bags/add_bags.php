<?php
// Get the product data
$categoryID = $_POST['categoryID'];
$code = $_POST['code'];
$bagName = $_POST['bagName'];
$description = $_POST['description'];
$listPrice = $_POST['listPrice'];

// Validate inputs
if (empty($code) || empty($bagName) || empty($description) || empty($listPrice) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO bags
                 (CategoryID, code, bagName, description, listPrice)
              VALUES
                 ('$categoryID', '$code', '$bagName', '$description', '$listPrice')";
    $db->exec($query);

    // Display the Product List page
    include('index_for_bags.php');
}
?>