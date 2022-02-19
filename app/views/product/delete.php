
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php var_dump($_SERVER['PHP_SELF']); ?>
    <label id="sku">sku товару</label>
    <input type="text" name="sku" id="sku">

    <label id="productName"></label>
    <input type="text" name="productName" id="productName">
    <input type="submit" value="Submit">
</form>