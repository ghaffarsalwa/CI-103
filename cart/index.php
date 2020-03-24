<!DOCTYPE  html>
<a id="backLink" href="../buyer_page">Back</a>
<?php
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
// $lifetime = 0;                      // per-session cookie
session_set_cookie_params($lifetime, '/');
session_start();

// Create a cart array if needed
if (empty($_SESSION['cart13'])) $_SESSION['cart13'] = array();

// Create a table of products
$books = array();
$books['MMS-1754'] = array('name' => 'Anatomy & Physiology', 'cost' => '99.00');
$books['MMS-6289'] = array('name' => 'Microbiology', 'cost' => '199.00');
$books['MMS-9876'] = array('name' => 'Cells and Genetics', 'cost' => '274.00');
$books['MMS-4321'] = array('name' => 'Principles of Biochemistry', 'cost' => '99.99');
$books['MMS-1534'] = array('name' => 'Essential Calculus early transcendentals', 'cost' => '99.00');
$books['MMS-1899'] = array('name' => 'Interaction Design: Beyond Human-Computer Interaction', 'cost' => '115.00');
$books['MMS-2391'] = array('name' => 'CompTIA Security+ Guide to Network Security Fundamentals', 'cost' => '99.99');
$books['MMS-3695'] = array('name' => 'Organic Chemistry', 'cost' => '86.99');
$books['MMS-3408'] = array('name' => 'Discrete Math', 'cost' => '50.99');

// Include cart functions
require_once('cart.php');

// Get the action to perform
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_item';
}

// Add or update cart as needed
switch($action) {
    case 'add':
        
        
        add_item($_POST['bookkey'], $_POST['itemqty']);
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = $_POST['newqty'];
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart13'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }
        include('cart_view.php');
        break;
    case 'show_cart':
        include('cart_view.php');
        break;
    case 'show_add_item':
        include('add_item_view.php');
        break;
    case 'empty_cart':
        unset($_SESSION['cart13']);
        include('cart_view.php');
        break;
}
?>


