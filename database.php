<?php

// ket noi csdl
$dsn = 'mysql:host:127.0.0.1;dbname=classicmodels;port=3306';
$user = 'root';
$password = "123456@Abc";
$connection = null;
try {
    // tao ket noi csdl
    $connection = new PDO($dsn, $user, $password);
}catch (PDOException $e) {
    echo "Error";
    die(500);
}

function getOrderByCustomerId($customerId) {
    // tu khoa global truy xuat bien ngoai ham
    global $connection;
    $sql = "SELECT * FROM classicmodels.orders 
            WHERE orders.customerNumber = $customerId";
    // dua sql vao pdo
    $stmt = $connection->prepare($sql);
    // thuc hien truy van csdl
    $stmt->execute();
    // get ket qua
    return $stmt->fetchAll();
}

function getCustomer(){
    // tu khoa global truy xuat bien ngoai ham
    global $connection;
    // doc du lieu database
    $sql = "SELECT * FROM classicmodels.customers LIMIT 10";
    // dua sql vao pdo
    $stmt = $connection->prepare($sql);
    // thuc hien truy van csdl
    $stmt->execute();
    // get ket qua
    return $stmt->fetchAll();
}


