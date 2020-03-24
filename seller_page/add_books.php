<?php
// Get the product data
$categoryID = $_POST['categoryID'];
$code = $_POST['code'];
$subject = $_POST['subject'];
$ISBN = $_POST['ISBN'];
$bookName = $_POST['bookName'];
$description = $_POST['description'];
$course = $_POST['course'];
$listPrice = $_POST['listPrice'];

// Validate inputs
if (empty($code) || empty($subject) || empty($ISBN) || empty($bookName) || empty($description) || empty($course) || empty($listPrice) ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('../errors/error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO books
                 (CategoryID, code, subject, ISBN, bookName, description, course, listPrice)
              VALUES
                 ('$categoryID', '$code', '$subject', '$ISBN', '$bookName', '$description', '$course', '$listPrice')";
    $db->exec($query);

    // Display the Product List page
    include('image_form/index.php');
}
?>