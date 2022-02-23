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
    public int $idAddedProduct;

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
            $db->addEntity($this,$values);
           $this->idAddedProduct = $db->getIdProduct($this,$values);
        }
    }


    public function delItem(){
        $db = new DB();
        $db->deleteEntity($this);
    }

    public function saveItem($values){
        $db = new DB();
        $db->updateEntity($this,$values);
    }

};


