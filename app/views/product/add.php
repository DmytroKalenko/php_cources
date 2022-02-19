


<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php $_SERVER['PHP_SELF']; ?>
    <label for="sku">sku товару</label>
    <input type="text" name="sku" id="sku">

    <label for="productnames">Назва</label>
    <input type="text" name="productnames" id="productnames">

    <label for="productPrice">Ціна</label>
    <input type="text" name="productPrice" id="productPrice">

    <label for="productQuantity">Кількість</label>
    <input type="text" name="productQuantity" id="productQuantity">

    <label for="productDescription">Опис</label>
    <textarea name="productDescription" id="productDescription"></textarea>

    <input type="submit" value="Додати продукт">
</form>



