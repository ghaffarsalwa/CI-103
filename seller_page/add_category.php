<?php
  $categoryName = filter_input (INPUT_POST, 'categoryName');

// Validate inputs S.G.
if ($categoryName == null)  {
    $error = "Invalid category. Please try again.";
    include('../errors/error.php');
} else {
    // If valid, add the product to the database S.G.
    require('database.php');
	
	
    $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:categoryName)';
    $statement = $db->prepare($query);
	$statement-> bindValue(':categoryName',  $categoryName);
	$statement-> execute();
	$statement-> closeCursor();
	
	
    // Display the category List page S.G.
    include('category_list.php');
}
?>