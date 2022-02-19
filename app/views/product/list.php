<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php $_SERVER['PHP_SELF'] ?>
    <select name='sortfirst'>
        <option <?php echo filter_input(INPUT_POST, 'sortfirst') === 'price_ASC' ? 'selected' : ''; ?>
                value="price_ASC">від дешевших до дорожчих
        </option>
        <option <?php echo filter_input(INPUT_POST, 'sortfirst') === 'price_DESC' ? 'selected' : ''; ?>
                value="price_DESC">від дорожчих до дешевших
        </option>
    </select>
    <select name='sortsecond'>
        <option <?php echo filter_input(INPUT_POST, 'sortsecond') === 'qty_ASC' ? 'selected' : ''; ?> value="qty_ASC">по
            зростанню кількості
        </option>
        <option <?php echo filter_input(INPUT_POST, 'sortsecond') === 'qty_DESC' ? 'selected' : ''; ?> value="qty_DESC">
            по спаданню кількості
        </option>
    </select>
    <input type="submit" value="Submit">
</form>


<?php

function sortProductsPriceMore(array &$array){
    $temp = null;
    $n = count($array);
    for($i=0; $i<$n; $i++) {
        for($j=0; $j<$n-$i-1; $j++) {
            if($array[$j]['price']<$array[$j+1]['price']) {
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }
}
function sortProductsPriceLess(array &$array){
    $temp = null;
    for($i=0; $i<count($array); $i++) {
        for($j=0; $j<count($array)-$i-1; $j++) {
            if($array[$j]['price']>$array[$j+1]['price']) {
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }

}

function sortProductsQuantityMore(array &$array){
    $temp = null;
    for($i=0; $i<count($array); $i++) {
        for($j=0; $j<count($array)-$i-1; $j++) {
            if($array[$j]['price']==$array[$j+1]['price']){
                if($array[$j]['qty']<$array[$j+1]['qty']) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $temp;
                }
            }

        }
    }
}
function sortProductsQuantityLess(array &$array){
    $temp = null;
    for($i=0; $i<count($array); $i++) {
        for($j=0; $j<count($array)-$i-1; $j++) {
            if($array[$j]['price']==$array[$j+1]['price']){
                if($array[$j]['qty']>$array[$j+1]['qty']) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $temp;
                }
            }

        }
    }
}

$products = $this->get('products');

   if (count($_POST)>0) {
        if(($_POST['sortfirst']==='price_ASC') &&( $_POST['sortsecond']==='qty_ASC')){
            sortProductsPriceLess($products);
            sortProductsQuantityLess($products);
        }elseif(($_POST['sortfirst']==='price_ASC') &&( $_POST['sortsecond']==='qty_DESC')){
            sortProductsPriceLess($products);
            sortProductsQuantityMore($products);
       }elseif(($_POST['sortfirst']==='price_DESC') &&( $_POST['sortsecond']==='qty_ASC')){
            sortProductsPriceMore($products);
            sortProductsQuantityLess($products);
        }
        elseif(($_POST['sortfirst']==='price_DESC') &&( $_POST['sortsecond']==='qty_DESC')){
            sortProductsPriceMore($products);
            sortProductsQuantityMore($products);
        }
   }

?>

<div class="product">
    <p><?= \Core\Url::getLink('/product/add', 'Додати товар'); ?></p>
</div>

<?php

foreach ($products as $product)  :
    ?>
    <div id="product-<?php echo $product['id'] ?>" class="product">
        <p class="sku">Код: <?php echo $product['sku'] ?></p>
        <h4><?php echo $product['name'] ?></h4>
        <p> Ціна: <span class="price"><?php echo $product['price'] ?></span> грн</p>
        <p> Кількість: <?php echo $product['qty'] ?></p>
        <p><?php if (!($product['qty'] > 0)) {
                echo 'Нема в наявності';
            } ?></p>
        <div class="buttons">
            <p id="edit__btn">
                <?= \Core\Url::getLink('/product/edit', 'Редагувати', array('id' => $product['id'])); ?>
            </p>
            <p id="delete__btn">
                <?= \Core\Url::getLink('/product/delete', 'Видалити', array('id' => $product['id'])); ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>

