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
    private array $fields = [
        'sku' => [
            'field_name' => 'sku'
        ],
        'name' => [
            'field_name' => 'Назва'
        ],
        'price' => [
            'field_name' => 'Ціна'
        ],
        'qty' => [
            'field_name' => 'Кількість'
        ],
        'description' => [
            'field_name' => 'Опис'
        ],
    ];

    public int $idAddedProduct = 0;

    /**
     * Product constructor.
     */

    function __construct()
    {
        $this->tableName = 'products';
        $this->idColumn = 'id';
    }

    public function addItem($values)
    {
        $this->fields = $this->setFields($values, $this->fields);
        if ($this->validation($this->fields)) {
           echo $this->validation($this->fields);
            return false;
        } else {
            $db = new DB();
            $db->addEntity($this, $values);
            $this->idAddedProduct = $db->getIdProduct($this, $values);
            return true;
        }

    }


    public function delItem()
    {
        $db = new DB();
        $db->deleteEntity($this);
    }

    public function saveItem($values)
    {
       $this->fields = $this->setFields($values, $this->fields);
        if ($this->validation($this->fields)) {
            echo $this->validation($this->fields);
            return false;
        } else {
            $db = new DB();
            $db->updateEntity($this, $values);
            $this->idAddedProduct = $db->getIdProduct($this,  $this->fields );
            return true;
        }

    }

    private function setFields(array $postData, array $values): array
    {
        foreach ($postData as $key => $value) {
            if (array_key_exists($key, $values)) {
                $values[$key]['value'] = trim(strip_tags($value));
            }
        }
        return $values;
    }

    private function validation($fields)
    {
        $errors = '';
        foreach ($fields as $key => $value) {
            if(($key == 'price')&&(isset($value['value'])&&(!is_numeric($value['value'])))){
                $errors .= "<p>Поле<b> {$fields[$key]["field_name"]} </b>повинно містити тільки ціфри <p>";
            }
            if(($key == 'qty')&&(isset($value['value'])&&(!is_numeric($value['value'])))) {
                $errors .= "<p>Поле<b> {$fields[$key]["field_name"]} </b>повинно містити тільки ціфри <p>";
            }
        }

       return $errors;
    }

}

;
