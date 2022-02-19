<?php

declare(strict_types=1);

namespace Models;

use Core\Model;
use Core\DB;
/**
 * Class Product
 */
class Product extends Model
{
    /**
     * Product constructor.
     */
    function __construct()
    {
        $this->tableName = 'products';
        $this->idColumn = 'id';
    }

    public function addItem($values){
        if(count($values)>0){
            $db = new DB();
            $db->getConnection();
            $sql = "INSERT INTO products (sku,name,price,qty,description)
        VALUES ('{$values['sku']}','{$values['productnames']}','{$values['productPrice']}','{$values['productQuantity']}','{$values['productDescription']}')";
            $db->getConnection()->exec($sql);
            header("Location: http://localhost/store/product/list");
            exit();
        }
    }
}
