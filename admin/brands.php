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
<nav><a href="index.php">Home</a></nav>

    <h1>Manage Brands: </h1>
    <form action="">
        <table>
            <thead>
                <tr>
                    <th>Id No.</th>
                    <th>Brand Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM brands";
                $res = $conn->query($sql);

                $count = $res->num_rows;
                if ($count > 0) {
                    while ($fetch = $res->fetch_assoc()) {
                        $id = $fetch['brand_id'];
                        $name = $fetch['brand_name'];
                        $status = $fetch['brand_status'];
                        echo <<<brands
                                <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>
                                brands;
                                    if($status == 1){
                                        echo "<button class='available abtn'>available</button>";
                                    }else{
                                        echo "<button class='notavailable abtn'>not available</button>";
                                    }
                                echo<<<brands
                                    </td>
                                    <td><button>Edit</button>&nbsp;<button>Delete</button></td>
                                </tr>
                                brands;
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