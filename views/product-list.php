<?php
include_once "../database.php";

if (isset($_REQUEST['action'])) {
    $productId = $_REQUEST['pId'];
    try {
        deleteProduct($productId);
        header('Location: ./product-list.php');
    }catch (PDOException $e) {
        echo '<script type="text/javascript"> alert("Error")</script>';
    }
}
// doc du lieu database
$result = getPrducts();

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
            width: 900px;
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
<a href="../index.php">Back</a>

<table>
    <caption>
        <h2>List product</h2>
        <a href="./add-product.php">+ Add product</a>
    </caption>
    <tr id="table-header">
        <td>STT</td>
        <td>Product Number</td>
        <td>Product Name</td>
        <td>Product Image</td>
        <td>Product Quantity</td>
        <td>Product Price</td>
        <td></td>
    </tr>
    <?php foreach ($result as $key => $product):  ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $product['productCode']?></td>
            <td><img width="150" src="<?php echo $product['images'] ?? "../image-default.jpeg" ?>" alt="product image"></td>
            <td><?php echo $product['productName']?></td>
            <td><?php echo $product['quantityInStock']?></td>
            <td><?php echo $product['buyPrice']?></td>
            <td><a onclick="return confirm('Are you sure?')" href="./product-list.php?action=delete&pId=<?php echo $product['productCode'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

