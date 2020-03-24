<?php
require_once('../util/main.php');
require_once('../util/tags.php');
require_once('../model/database.php');
require_once('../model/product_db.php');
require_once('../model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

switch ($action) {
    case 'list_products':
        // get current category
        $categoryID = $_GET['categoryID'];
        if (empty($categoryID)) {
            $categoryID = 1;
        }

        // get categories and products
        $current_category = get_category($categoryID);
        $categories = get_categories();
        $books = get_products_by_category($categoryID);

        // Display view
        include('product_list.php');
        break;
    case 'view_product':
        $categories = get_categories();

        // Get product data
        $bookID = $_GET['bookID'];
        $book = get_product($bookID);

        // Display product
        include('product_view.php');
        break;
}
?>