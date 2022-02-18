<script type="text/javascript" charset=utf-8">

    window.addEventListener('DOMContentLoaded', (e) => {
        const btnDeleteProduct = [...document.querySelectorAll('#delete__btn a')];
        // const elemProduct = document.querySelectorAll('.product');


        function deleteProduct() {
            btnDeleteProduct.map((elem) => {
                elem.addEventListener('click', (e) => {
                    e.preventDefault();
                    // elem.closest('.product').remove();
                    ajaxHandler();
                })
            })

        }
        deleteProduct();


        function ajaxHandler() {
            fetch('list_ajax' ,  {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
                body: JSON.stringify({
                    dell: 'dell'
                })
            }).then(res => {
                if(res.ok){
                    console.log('ok')
                }else {
                    console.log('error')
                }
            })
            .then(res => res.json())
            .then(data => console.log(data))
            .catch(error => console.log(error))

        }
    })
</script>


<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php var_dump($_SERVER['PHP_SELF']); ?>
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

<div class="product">
    <p><?= \Core\Url::getLink('/product/add', 'Додати товар'); ?></p>
</div>

<?php
$products = $this->get('products');

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
        <div class="box">
            <p id="delete__edit">
                <?= \Core\Url::getLink('/product/edit', 'Редагувати', array('id' => $product['id'])); ?>
            </p>
            <p id="delete__btn">
                <?= \Core\Url::getLink('/product/delete', 'Видалити', array('id' => $product['id'])); ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>

