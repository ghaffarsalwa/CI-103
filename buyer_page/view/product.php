<head>
<link rel="stylesheet" type="text/css" href="../../styles.css" />
</head>
<body>

<div id="bookAddPageBody">

<?php
    // Parse data
    $categoryID = $book['categoryID'];
    $code = $book['code'];
    $subject = $book['subject'];
    $ISBN = $book['ISBN'];
    $bookName = $book['bookName'];
    $description = $book['description'];
    $course = $book['course'];
    $listPrice = $book['listPrice'];
    $discount_percent = $book['discountPercent'];

    // Add HMTL tags to the description
    $description = add_tags($description);

    // Calculate discounts
    $discount_amount = round($listPrice * ($discount_percent / 100), 2);
    $unit_price = $listPrice - $discount_amount;

    // Format discounts
    $discount_percent = number_format($discount_percent, 0);
    $discount_amount = number_format($discount_amount, 2);
    $unit_price = number_format($unit_price, 2);

    // Get image URL and alternate text
    $image_filename = $code . '.png';
    $image_path = $app_path . '../images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>

<h1><?php echo $bookName; ?></h1>
<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>

<div id="right_column">
    <p><b>List Price:</b>
        <?php echo '$' . $listPrice; ?></p>
    <p><b>Discount:</b>
        <?php echo $discount_percent . '%'; ?></p>
    <p><b>Your Price:</b>
        <?php echo '$' . $unit_price; ?>
        (You save
        <?php echo '$' . $discount_amount; ?>)</p>
    <form action="<?php echo $app_path . '../cart' ?>" method="post">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="bookID"
               value="<?php echo $bookID; ?>" />
        <b>Quantity:</b>
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>
    <h2>Description</h2>
    <?php echo $description; ?>
</div>
</div>
</body>