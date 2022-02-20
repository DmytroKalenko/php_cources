<?php
$product = $this->get('product');
var_dump($product);

?>
<form class="product" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <input type="hidden" name=id value="<?php echo $product['id'] ?>">

    <label for="sku">Код</label>
    <input type="text" name="sku" id="sku" value="<?php echo $product['sku'] ?>">

    <label for="nameProduct">Назва</label>
    <input type="text" name="name" id="name"  value="<?php echo $product['name'] ?>">

    <label for="price">Ціна:</label>
    <input type="text" name="price" id="price"  value="<?php echo $product['price'] ?>">

    <label for="quantity">Кількість:</label>
    <input type="text" name="qty" id="quantity" value="<?php echo $product['qty'] ?>">

    <label for="description">Опис:</label>
    <textarea name="description" id="description"><?php echo $product['description'] ?></textarea>

    <input type="submit" value="Записати">
</form>



