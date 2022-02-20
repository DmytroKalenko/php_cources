<?php
$product = $this->get('product');


?>
<form class="product" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php $_SERVER['PHP_SELF']; ?>
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


    <?= \Core\Url::getLink('/product/edit', 'Записати', array('id' => $product['id'])); ?>

</form>


