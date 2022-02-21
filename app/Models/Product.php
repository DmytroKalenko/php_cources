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
            $db->addEntity($this,$values);
            header("Location: http://localhost/store/product/list");
            exit();
        }
    }


    public function delItem($id){
        $db = new DB();
        $db->deleteEntity($this,$id);
        header("Location: http://localhost/store/product/list");
    }

    public function saveItem($values,$id){
        $db = new DB();
        $db->updateEntity($this,$values,$id);
    }

};


