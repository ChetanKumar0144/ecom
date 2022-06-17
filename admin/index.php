<?php
    require_once('../database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>total number of <a href="users.php">users</a>: 
        <?php
            $sql = "SELECT * FROM users";
            $res = $conn->query($sql);

            $count = $res->num_rows;
            if($count==0){
                echo "no data record.";
            }else{
                echo $count;
            }
        ?>
    </h1>
    <h1>total number of <a href="categories.php">Categories</a>: 
        <?php
            $sql = "SELECT * FROM categories WHERE categories_status = 1";
            $res = $conn->query($sql);

            $count = $res->num_rows;
            if($count==0){
                echo "no data record.";
            }else{
                echo $count;
            }
        ?>
    </h1>
    <h1>total number of <a href="brands.php"> Brands</a>: 
        <?php
            $sql = "SELECT * FROM brands";
            $res = $conn->query($sql);

            $count = $res->num_rows;
            if($count==0){
                echo "no data record.";
            }else{
                echo $count;
            }
        ?>
    </h1>
    <h1>total number of <a href="products.php">Products</a>: 
        <?php
            $sql = "SELECT * FROM product";
            $res = $conn->query($sql);

            $count = $res->num_rows;
            if($count==0){
                echo "no data record.";
            }else{
                echo $count;
            }
        ?>
    </h1>
</body>
</html>