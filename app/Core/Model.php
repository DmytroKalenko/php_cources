<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Model
 */
abstract class Model implements DbModelInterface
{
    /**
     * @var int
     */
    protected int $productId;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $idColumn;

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var
     */
    protected $collection;

    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return $this
     */
    public function initCollection()
    {
        $columns = implode(',', $this->getColumns());
        $this->sql = "select $columns from " . $this->getTableName();

        return $this;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        $db = new DB();
        $sql = "show columns from {$this->getTableName()};";
        $results = $db->query($sql);
        foreach ($results as $result) {
            $this->columns[] = $result['Field'];
        }
        return $this->columns;
    }

    /**
     * @param $params
     * @return $this
     */
    public function sort($params)
    {
        $products = $this->collection;
        if(($params['price']==="ASC") && ($params['qty']==="ASC")){
            $this -> sortProductsPriceLess($products);
            $this -> sortProductsQuantityLess($products);
        }elseif(($params['price']==="ASC") && ($params['qty']==="DESC")){
            $this -> sortProductsPriceLess($products);
            $this -> sortProductsQuantityMore($products);
       }elseif(($params['price']==='DESC') && ($params['qty']==="ASC")){
            $this -> sortProductsPriceMore($products);
            $this -> sortProductsQuantityLess($products);
        }
        elseif(($params['price']==='DESC') && ($params['qty']==="DESC")){
           $this -> sortProductsPriceMore($products);
           $this -> sortProductsQuantityMore($products);
        }
        $this->collection = $products;

        return $this;

    }

    /**
     * @param $params
     */
    public function filter($params)
    {
        /*
          TODO

         */

        return $this;
    }

    /**
     * @return $this
     */
    public function getCollection()
    {
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;
    }

    /**
     * @return mixed
     */
    public function select()
    {
        return $this->collection;
    }

    /**
     * @return array|null
     */
    public function selectFirst(): ?array
    {
        return $this->collection[0] ?? null;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getItem($id): ?array
    {
        $sql = "select * from {$this->getTableName()} where $this->idColumn = ?;";
        $db = new DB();
        $params = [$id];
        return $db->query($sql, $params)[0] ?? null;
    }

    /**
     * @return array
     */
    public function getPostValues()
    {
        $values = [];
        $columns = $this->getColumns();
        foreach ($columns as $column) {
            /*
              if ( isset($_POST[$column]) && $column !== $this->id_column ) {
              $values[$column] = $_POST[$column];
              }
             * 
             */
            $column_value = filter_input(INPUT_POST, $column);
            if ($column_value && $column !== $this->idColumn) {
                $values[$column] = $column_value;
            }
        }
        return $values;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getPrimaryKeyName(): string
    {
        return $this->idColumn;
    }

    public function setId(int $id){
        $this->productId = $id;
    }

    public function getId():int
    {
        return $this->productId;
    }

    private function sortProductsPriceMore(array &$array){
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
    private function sortProductsPriceLess(array &$array){
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

    private function sortProductsQuantityMore(array &$array){
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
    private function sortProductsQuantityLess(array &$array){
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



}
