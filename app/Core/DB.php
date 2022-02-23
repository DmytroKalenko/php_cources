<?php

declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;

/**
 * Class DB
 */
class DB
{

    /**
     * @var PDO
     */
    private static $pdo;

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $dsn = 'mysql:host=' . MYSQL_HOST . ';port=' . MYSQL_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            try {
                self::$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit(); // this is a bad way how to handle PDO exception
            }
        }

        return self::$pdo;
    }

    /**
     * @param string $sql
     * @param array $parameters
     *
     * @return array|bool
     */
    public function query(string $sql, array $parameters = [])
    {
        $dbh = $this->getConnection();
        $stmt = $dbh->prepare($sql);
        $result = $stmt->execute($parameters);

        if ($result !== false) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "sucsess";
        } else {
            echo "error";
            return false;
        }
    }


    /**
     * Add provided entity
     *
     * @param DbModelInterface $model
     * @return bool
     */
    public function addEntity(DbModelInterface $model, $product )
    {
        /*
         TODO
         validation;
        */
        $sku= '';
        $qty = 0;
        $description = '';
        if (array_key_exists('sku', $product)) {
            $sku =$product['sku'];
        }
        if (array_key_exists('qty', $product)) {
            $sku =$product['qty'];
        }
        if (array_key_exists('description', $product)) {
            $sku =$product['description'];
        }


        $dbh = $this->getConnection();
        $sql = sprintf("INSERT INTO %s (sku,name,price,qty,description) VALUE ('%s','%s','%s','%s','%s')",
            $model->getTableName(),
            $sku,
            $product['name'],
            $product['price'],
            $qty,
            $description
        );
       $statement = $dbh->prepare($sql);
        return $statement->execute([]);


    }



    /**
     * Delete provided entity
     * 
     * @param DbModelInterface $model
     * @return bool
     */
    public function deleteEntity(DbModelInterface $model)
    {
        $dbh = $this->getConnection();
        $sql = sprintf("DELETE FROM %s WHERE %s = ?",
                $model->getTableName(),
                $model->getPrimaryKeyName()
        );
        $statement = $dbh->prepare($sql);
         return $statement->execute([$model->getId()]);
    }

    /**
     * Update provided entity
     *
     * @param DbModelInterface $model
     * @return bool
     */
    public function updateEntity(DbModelInterface $model,$product)
    {

        $sku= '';
        $name = '';
        $qty = 0;
        $price = 0;
        $description = '';
        if (array_key_exists('sku', $product)) {
            $sku =$product['sku'];
        }
        if (array_key_exists('name', $product)) {
            $name =$product['name'];
        }
        if (array_key_exists('price', $product)) {
            $price =$product['price'];
        }
        if (array_key_exists('qty', $product)) {
            $qty =$product['qty'];
        }
        if (array_key_exists('description', $product)) {
            $description =$product['description'];
        }


        $dbh = $this->getConnection();
        $sql = sprintf("UPDATE %s
                                SET sku = '%s', name = '%s', price = '%s', qty = '%s', description = '%s'
                                WHERE id = ?",
            $model->getTableName(),
            $sku,
            $name,
            $price,
            $qty,
            $description
        );
        $statement = $dbh->prepare($sql);

        return $statement->execute([$model->getId()]);
    }

    public function getIdProduct(DbModelInterface $model,$values){
       $dbh = $this->getConnection();
        $sql = sprintf("SELECT * FROM %s where name = '{$values['name']}'",
            $model->getTableName(),
        );
        $statement = $dbh->query($sql);
        $result = $statement->fetch();
        return $result['id'];
    }

}
