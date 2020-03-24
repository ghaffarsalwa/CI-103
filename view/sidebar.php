<div id="sidebar">
    <ul class="nav">
        <!-- display links for all categories -->
        <?php foreach($categories as $category) : ?>
        <li>
            <a href="?categoryID=<?php 
                    echo $category['categoryID']; ?>">
              <?php echo $category['categoryName']; ?>
            </a>
        </li>
        <?php endforeach; ?>
        <li>
            <p><a href="../index.php">Home</a></p>
        </li>
    </ul>
</div>