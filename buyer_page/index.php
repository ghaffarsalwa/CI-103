<?php
require_once('util/main.php');
require_once('util/tags.php');
require_once('model/database.php');
require_once('model/product_db.php');
require_once('model/category_db.php');


// Get all categories
$categories = get_categories();

// Set the featured product IDs in an array
$product_ids = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
// Note: You could also store a list of featured products in the database

// Get an array of featured products from the database
$books = array();
foreach ($product_ids as $bookID) {
    $book = get_product($bookID);
    $books[] = $book;   // add product to array
}

// Display the home page
include('home_view.php');
?>