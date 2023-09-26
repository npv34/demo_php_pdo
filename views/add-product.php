<?php
include_once "../database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //upload file
    $target_dir = "../uploads/";
    //Đường dẫn lưu file trên server
    $target_file   = $target_dir . basename($_FILES["images"]["name"]);
    move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
    //inser database
    insertProduct($_REQUEST, $target_file);
    header('Location: ./product-list.php');
} else {
    $productLines = getProductLine();
}

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
        }

        input {
            width: 98%;
            height: 30px;
        }
        tr {
            height: 50px
        }
    </style>
</head>
<body>
<a href="./product-list.php">View product</a>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <caption><h2>Add product</h2></caption>
        <tr>
            <td>Product Code</td>
            <td><input type="text" name="productCode"></td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="productName"></td>
        </tr>
        <tr>
            <td>Product Line</td>
            <td>
                <select name="productLine" id="">
                    <?php foreach ($productLines as $item): ?>
                    <option value="<?php echo $item['productLine'] ?>"><?php echo $item['productLine'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Product Scale</td>
            <td><input type="text" name="productScale"></td>
        </tr>
        <tr>
            <td>Product Vendor</td>
            <td><input type="text" name="productVendor"></td>
        </tr>
        <tr>
            <td>Product Desc</td>
            <td>
                <textarea name="productDescription" id="" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td>Product Quantity</td>
            <td><input type="number" name="quantityInStock"></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td><input type="number" name="buyPrice"></td>
        </tr>
        <tr>
            <td>Product MSRP</td>
            <td><input type="text" name="MSRP"></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="images"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Save</button>
            </td>
        </tr>

    </table>
</form>

</body>
</html>
