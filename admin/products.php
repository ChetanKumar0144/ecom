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
    <style>
        th {
            border-bottom: 1px solid black;
            text-align: left;
            padding-left: 1rem;
        }

        table {
            width: 100%;
            margin: auto;
            border: 1px solid black;
            margin-top: 2rem;
        }
        td {
            border-right: 1px solid grey;
            width: auto;
            padding: 1rem;
        }
        .modal{
            display: none;
        }
        .abtn{
            border: 1px solid transparent;
            outline: none;
            border-radius: .2rem ;
        }
        .available{
            background: green;
            color: #fff;
        }
        .notavailable{
            background: #cf3b3b;
            color: #fff;
        }

    </style>
</head>

<body>
    <nav>
        <a href="index.php">home</a>
    </nav>
    <h1>Manage Products: </h1>
    <form action="">
        <table>
            <thead>
                <tr>
                    <th>Id No.</th>
                    <th>Brand Name</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class = "tbodypart">
                    <?php
                    $sql = "SELECT * FROM product";
                    $res = $conn->query($sql);

                    $count = $res->num_rows;
                    if ($count > 0) {
                        while ($fetch = $res->fetch_assoc()) {
                            $id = $fetch['product_id'];
                            $name = $fetch['product_name'];
                            $status = $fetch['status'];
                            $category = $fetch['categories_id'];
                            $brand = $fetch['brand_id'];
                            echo <<<categories
                                <tr>
                                    <td>$id</td>
                                    <td>
                            categories;
                                        $query = "SELECT * FROM brands WHERE brand_id = '$brand'";
                                        $query_run = $conn->query($query);
                                        if($query_run->num_rows>0 ){
                                            $fetch_category = $query_run->fetch_assoc();
                                            $brand_name = $fetch_category['brand_name'];

                                            echo $brand_name;
                                        }

                                            echo<<<categories
                                        </td>
                                    <td>
                            categories;
                                        $query = "SELECT * FROM categories WHERE categories_id = '$category'";
                                        $query_run = $conn->query($query);
                                        if($query_run->num_rows>0 ){
                                            $fetch_category = $query_run->fetch_assoc();
                                            $category_name = $fetch_category['categories_name'];

                                            echo $category_name;
                                        }

                                            echo<<<categories
                                        </td>                                    
                                        <td>$name</td>
                                        <td>
                                    categories;
                                        if($status == 1){
                                            echo "<button class='available abtn'>available</button>";
                                        }else{
                                            echo "<button class='notavailable abtn'>not available</button>";
                                        }
                                    echo<<<categories
                                        </td>

                                        <td><button>Edit</button>&nbsp;<button>Delete</button></td>
                                    </tr>
                                    categories;
                        }
                    } else {
                        echo "no record found";
                    }
                    ?>
            </tbody>
        </table>
    </form>
</body>

</html>