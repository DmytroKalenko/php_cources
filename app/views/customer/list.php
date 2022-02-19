<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <?php $_SERVER['PHP_SELF'] ?>
    <select name='sortfirst'>
        <option <?php echo filter_input(INPUT_POST, 'sortname') === 'name_ASC' ? 'selected' : ''; ?>
                value="name_ASC">від А до Я
        </option>
        <option <?php echo filter_input(INPUT_POST, 'sortname') === 'name_DESC' ? 'selected' : ''; ?>
                value="name_DESC">від Я до А
        </option>
    </select>
    <input type="submit" value="Submit">
</form>

<div class="customer">
    <p><?= \Core\Url::getLink('/customer/add', 'Додати клієнта'); ?></p>
</div>

<?php
$customers = $this->get('customers');

foreach ($customers as $customer)  :
    ?>
    <div id="customer-<?php echo $customer['customer_id'] ?>" class="customer">
        <h4><?php echo $customer['last_name'] ,' ', $customer['first_name'] ?></h4>
        <span class="id">id: <?php echo $customer['customer_id'] ?></span>
        <span class="city">Місто: <?php echo $customer['city'] ?></span>
        <span class="phoneNumber">Номер телефону: <a href="tel:<?php echo $customer['telephone'] ?>"><?php echo $customer['telephone'] ?></a></span>
        <span class="mail">Е-mail: <a href="mailto:"<?php echo $customer['email']?>"><?php echo $customer['email'] ?></a></span>

        <div class="box">
            <span id="delete__edit">
                <?= \Core\Url::getLink('/customer/edit', 'Редагувати', array('id' => $customer['customer_id'])); ?>
            </span>
            <span id="delete__btn">
                <?= \Core\Url::getLink('/customer/delete', 'Видалити', array('id' => $customer['customer_id'])); ?>
            </span>
        </div>
    </div>
<?php endforeach; ?>
