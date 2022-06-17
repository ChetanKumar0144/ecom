<?php
include('../database/connection.php');
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
        

    </style>
</head>

<body>
    <h1>Manage Users: </h1>
    <form action="">
        <table>
            <thead>
                <tr>
                    <th>Id No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $res = $conn->query($sql);

                $count = $res->num_rows;
                if ($count > 0) {
                    while ($fetch = $res->fetch_assoc()) {
                        $id = $fetch['id'];
                        $name = $fetch['name'];
                        $email = $fetch['email'];
                        $phone = $fetch['phone'];
                        echo <<<users
                                <tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td><button>Edit</button>&nbsp;<button>Delete</button></td>
                                </tr>
                            users;
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