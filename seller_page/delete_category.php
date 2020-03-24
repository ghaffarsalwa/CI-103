<?php
require_once('database.php');
	
	$categoryID = filter_input (INPUT_POST, 'categoryID' , FILTER_VALIDATE_INT);
	
if ($categoryID != false) {
$query = "DELETE FROM categories
          WHERE categoryID = '$categoryID'";

	$statement = $db->prepare($query);
	$statement-> bindValue(':categoryID' , $categoryID);
	$success = $statement->execute();
	$statement->closeCursor();

// display the Product List page S.G.
include('category_list.php');
}
?>