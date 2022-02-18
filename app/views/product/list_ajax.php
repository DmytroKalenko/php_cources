<?php
 $conn = mysqli_connect('localhost', 'root', 'root',  'test_shop');

if(isset($dell)){
    mysqli_query($conn, "DELETE FROM products id='{$dell}'");
}



 $sql = mysqli_query($conn, "SELECT * FROM products");

 $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

 exit(json_encode($result));



