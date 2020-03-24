<?php include '../view/header.php'; ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../styles.css"/>
    </head>
    <body>
        <div id="cartPage">

            <div id="cartMain">

<h2>Add Item</h2>
<form action="." method="post" class="aligned">
    <input type="hidden" name="action" value="add"/>

    <label>Name:</label>
    <select name="bookkey">
    <?php foreach($books as $key => $book) :
        $cost = number_format($book['cost'], 2);
        $bookName = $book['name'];
        $item = $bookName . ' ($' . $cost . ')';
    ?>
        <option value="<?php echo $key; ?>">
            <?php echo $item; ?>
        </option>
    <?php endforeach; ?>
    </select><br />

    <label>Quantity:</label>
    <select name="itemqty">
    <?php for($i = 1; $i <= 10; $i++) : ?>
        <option value="<?php echo $i; ?>">
            <?php echo $i; ?>
        </option>
    <?php endfor; ?>
    </select><br />

    <label>&nbsp;</label>
    <input type="submit" value="Add Item"/>
</form>
<p><a id="backLink" href=".?action=show_cart">View Cart</a></p>

            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>
<?php include '../view/footer.php'; ?>