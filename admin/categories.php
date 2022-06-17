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

        form {
            position: absolute;
            width: 99%;
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

        .modal {
            display: none;
        }

        .abtn {
            border: 1px solid transparent;
            outline: none;
            border-radius: .2rem;
        }

        .available {
            background: green;
            color: #fff;
        }

        .notavailable {
            background: #cf3b3b;
            color: #fff;
        }

        label {
            font-size: 1.2rem;
            margin: .5rem
        }

        input {
            width: 100%;
            margin-bottom: 1rem;
            font-weight: 400;
            font-size: 1.1rem;
            outline: none;
            border-radius: .2rem;
            border: none;
        }

        #idform{
            display: none;
        } 
        .form {
            margin: auto;
            background-color: #cf3b3b;
            width: 50%;
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 1rem;
            border-radius: .2rem;
        }
    </style>
</head>

<body>
    <nav><a href="index.php">Home</a></nav>

    <h1>Manage Categories: </h1>

    <button id="addCat" onclick="addcat()">Add Category</button>

    <form action="php_codes/categoriescode.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Id No.</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categories";
                $res = $conn->query($sql);

                $count = $res->num_rows;
                if ($count > 0) {
                    while ($fetch = $res->fetch_assoc()) {
                        $id = $fetch['categories_id'];
                        $name = $fetch['categories_name'];
                        $status = $fetch['categories_status'];
                        echo <<<categories
                                <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>
                                categories;
                        if ($status == 1) {
                            echo "<button class='available abtn'>available</button>";
                        } else {
                            echo "<button class='notavailable abtn'>not available</button>";
                        }
                        echo <<<categories
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

    <form action="./php_codes/categoriescode.php" method="POST">
    <div class="form" id="idform">
        <div class="iwrap">
            <label for="category">Category</label>
            <input type="text" name="cat_name" placeholder="category name">
        </div>
        <div class="iwrap">
            <label for="category">Status</label>
            <select style="width:100%;margin-bottom:1rem;font-size:1.1rem" name="select_status" id="">
                <option value="1">Available</option>
                <option value="0">Not-available</option>
            </select>
        </div>
        <button type="submit" name="addcate">submit</button>
        <button class="close" onclick="close()">close</button>
    </div>
    </form>

    <script>
        function addcat() {
            document.getElementById('idform').style.display = "block";
        };
        function close(){
            document.getElementById('idform').style.display = "none";
        }
    </script>
</body>

</html>