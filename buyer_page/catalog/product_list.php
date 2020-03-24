<?php include '../../view/header.php'; ?>
<?php include '../../view/sidebar.php'; ?>
<div id="content">
    <h1><?php echo $current_category['categoryName']; ?></h1
    <?php if (count($books) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
        <?php foreach ($books as $book) : ?>
        <p>
            <a href="?action=view_product&amp;bookID=<?php
                      echo $book['bookID']; ?>">
                <?php echo $book['bookName']; ?>
            </a>
        </p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include '../../view/footer.php'; ?>