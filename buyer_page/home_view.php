<?php include '../view/header.php'; ?>


<div id="buyBookContent">
    
<a id ="backLink" href="../index.php">Back</a>
    <!-- display product -->
    <h1>Featured products</h1>
    <table id="buyBookTable">
    <?php foreach ($books as $book) :
        // Get product data
        $list_price = $book['listPrice'];
        $discount_percent = $book['discountPercent'];
//        $description = $book['description'];
        
        // Calculate unit price
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Get first paragraph of description
//        $description = add_tags($description);
//        $i = strpos($description, "</p>");
//        $description = substr($description, 3, $i-3);
    ?>
        <tr>
            <td id="product_image_column">
                <img src="../images/<?php echo $book['code']; ?>.png"
                     alt="&nbsp;">
            </td>                
                
            <td>
                <p>
                    <a href="catalog?action=view_product&amp;bookID=<?php 
                              echo $book['bookID']; ?>">
                        <?php echo $book['bookName']; ?>
                    </a>
                </p>
                <p>
                    <b>Your price:</b>
                    $<?php echo number_format($unit_price, 2); ?>
                </p>
                
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
<?php include '../view/footer.php'; ?>