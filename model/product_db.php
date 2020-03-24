<?php
function get_books() {
    global $db;
    $query = 'SELECT * FROM books
              ORDER BY bookID';
    $books = $db->query($query);
    return $books;
}

function get_books_by_category($categoryID) {
    global $db;
    $query = "SELECT * FROM books
              WHERE books.categoryID = '$categoryID'
              ORDER BY bookID";
    $books = $db->query($query);
    return $books;
}

function get_book($bookID) {
    global $db;
    $query = "SELECT * FROM books
              WHERE bookID = '$bookID'";
    $book = $db->query($query);
    $book = $book->fetch();
    return $book;
}

function delete_book($bookID) {
    global $db;
    $query = "DELETE FROM books
              WHERE bookID = '$bookID'";
    $db->exec($query);
}

function add_book($categoryID, $code, $subject, $ISBN, $bookName, $description, $course, $listPrice) {
    global $db;
    $query = "INSERT INTO books
                 (categoryID, code, subject, ISBN, bookName, description, course, listPrice)
              VALUES
                 ('$categoryID', '$code', '$subject', '$bookName', '$description', '$course', '$listPrice')";
    $db->exec($query);
}
?>