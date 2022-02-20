


<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php $_SERVER['PHP_SELF']; ?>
    <label for="sku">sku товару</label>
    <input type="text" name="sku" id="sku">

    <label for="productnames">Назва</label>
    <input type="text" name="name" id="productnames" required>

    <label for="productPrice">Ціна</label>
    <input type="text" name="price" id="productPrice" required>

    <label for="productQuantity">Кількість</label>
    <input type="text" name="qty" id="productQuantity">

    <label for="productDescription">Опис</label>
    <textarea name="description" id="productDescription"></textarea>

    <input type="submit" value="Додати продукт">
</form>



