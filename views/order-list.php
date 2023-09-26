<?php
include_once "../database.php";

$cID = $_GET['cID'];

// doc du lieu database
$result = getOrderByCustomerId($cID)

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 700px;
            border-collapse: collapse;
        }

        tr, td {
            border: 1px solid black
        }

        #table-header {
            font-weight: bold;
            text-align: center;
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
<h3>Customer had <?php echo count($result) ?> orders</h3>
<a href="../index.php">Back</a>
<table>
    <caption><h2>List order</h2></caption>
    <tr id="table-header">
        <td>STT</td>
        <td>Order Number</td>
        <td>Order Date</td>
        <td>Status</td>
        <td></td>
    </tr>
    <?php foreach ($result as $key => $order):  ?>
    <tr>
        <td><?php echo $key + 1 ?></td>
        <td><?php echo $order['orderNumber']?></td>
        <td><?php echo $order['orderDate']?></td>
        <td><?php echo $order['status']?></td>
        <td><a href="">View product</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
