<?php


declare(strict_types=1);

namespace Models;

use Core\Model;

/**
 * Class Product
 */
class Customer extends Model
{
    /**
     * Product constructor.
     */
    function __construct()
    {
        $this->tableName = 'customer';
        $this->idColumn = 'customer_id';
    }
}