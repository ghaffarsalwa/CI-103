<?php
function get_products_by_category($categoryID) {
    global $db;
    $query = 'SELECT * FROM books
              WHERE categoryID = :categoryID
              ORDER BY bookID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_products() {
    global $db;
    $query = 'SELECT * FROM books ORDER BY bookID';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($bookID) {
    global $db;
    $query = 'SELECT *
              FROM books
              WHERE bookID = :bookID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':bookID', $bookID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_product($categoryID, $code, $subject, $ISBN, $bookName, $description, $course,
        $listPrice) {
    global $db;
    $query = 'INSERT INTO books
                 (categoryID, code, subject, ISBN, bookName, description, course
                  listPrice, dateAdded)
              VALUES
                 (:categoryID, :code, :subject, :ISBN, :bookName, :description, :course, :listPrice,
                  NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->bindValue(':code', $code);
		$statement->bindValue(':subject', $subject);
		$statement->bindValue(':ISBN', $ISBN);
        $statement->bindValue(':bookName', $bookName);
        $statement->bindValue(':description', $description);
		$statement->bindValue(':course', $course);
        $statement->bindValue(':listPrice', $listPrice);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $bookID = $db->lastInsertId();
        return $bookID;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($bookID, $code, $subject, $ISBN, $bookName, $description, $course,
                        $listPrice, $categoryID) {
    global $db;
    $query = 'UPDATE books
              SET code = :code,
                  subject = :subject,
                  ISBN = :ISBN,
                  bookName = :bookName,
                  description = :description,
                  listPrice = :listPrice,
                  discountPercent = :discount_percent,
                  categoryID = :categoryID
              WHERE bookID = :bookID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':code', $code);
	$statement->bindValue(':subject', $subject);
	$statement->bindValue(':ISBN', $ISBN);
	$statement->bindValue(':bookName', $bookName);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':listPrice', $listPrice);
        $statement->bindValue(':discount_percent', $discount_percent);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->bindValue(':bookID', $bookID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($bookID) {
    global $db;
    $query = 'DELETE FROM books WHERE bookID = :bookID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':bookID', $bookID);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>