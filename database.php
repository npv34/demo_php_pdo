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


function getPrducts(){
    // tu khoa global truy xuat bien ngoai ham
    global $connection;
    // doc du lieu database
    $sql = "SELECT * FROM classicmodels.products ORDER BY productCode DESC";
    // dua sql vao pdo
    $stmt = $connection->prepare($sql);
    // thuc hien truy van csdl
    $stmt->execute();
    // get ket qua
    return $stmt->fetchAll();
}

// insert data
function insertProduct($request, $filePath) {
    // tu khoa global truy xuat bien ngoai ham
    global $connection;
    // insert du lieu database
    $sql = "
        INSERT INTO classicmodels.products(`productCode`, `productName`, `productLine`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`, `images`) 
        VALUES (?,?,?,?,?,?,?,?,?,?);
    ";
    // dua sql vao pdo
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $request['productCode']);
    $stmt->bindParam(2, $request['productName']);
    $stmt->bindParam(3, $request['productLine']);
    $stmt->bindParam(4, $request['productScale']);
    $stmt->bindParam(5, $request['productVendor']);
    $stmt->bindParam(6, $request['productDescription']);
    $stmt->bindParam(7, $request['quantityInStock']);
    $stmt->bindParam(8, $request['buyPrice']);
    $stmt->bindParam(9, $request['MSRP']);
    $stmt->bindParam(10, $filePath);
    // thuc hien truy van csdl
    $stmt->execute();
}

function getProductLine() {
    global $connection;
    // doc du lieu database
    $sql = "SELECT * FROM classicmodels.productlines";
    // dua sql vao pdo
    $stmt = $connection->prepare($sql);
    // thuc hien truy van csdl
    $stmt->execute();
    // get ket qua
    return $stmt->fetchAll();
}

function deleteProduct($id) {
    global $connection;
    // doc du lieu database
    $sql = "DELETE FROM classicmodels.products WHERE productCode = ?";
    // dua sql vao pdo
    $stmt = $connection->prepare($sql);
    // bind du lieu
    $stmt->bindParam(1, $id);
    // thuc hien truy van csdl
    $stmt->execute();
}

