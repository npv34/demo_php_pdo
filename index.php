<?php

include_once "./database.php";
$result = getCustomer();

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
<a href="./index.php">View customers</a>
<a href="">View orders</a>
<a href="">View products</a>

<table>
    <caption><h2>Customer list</h2><p>Total: <?php echo count($result) ?> customer</p></caption>
    <tr id="table-header">
        <td>STT</td>
        <td>Full Name</td>
        <td>Phone</td>
        <td>City</td>
        <td></td>
    </tr>
    <?php foreach ($result as $key => $customer): ?>
    <tr>
        <td><?php echo $key + 1 ?></td>
        <td><?php echo $customer['customerName']?></td>
        <td><?php echo $customer['phone'] ?></td>
        <td><?php echo $customer['city'] ?></td>
        <td><a href="./view-order.php?cID=<?php echo $customer['customerNumber'] ?>">View orders</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>


