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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<!-- <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Address</th>
                            <th scope="col">Pay Mode</th>
                            <th scope="col">Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM order_manager";
                            $user_result = $conn->query($query);
                            while($user_fetch = mysqli_fetch_assoc($user_result)){
                                echo "
                                <tr>
                                <td>$user_fetch[order_id]</td>
                                <td>$user_fetch[fullname]</td>
                                <td>$user_fetch[phone]</td>
                                <td>$user_fetch[address]</td>
                                <td>$user_fetch[paymode]</td>
                                <td>
                                    <table class='table table-dark'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>Item Name</th>
                                                <th scope='col'>Price</th>
                                                <th scope='col'>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    ";
                                    $order_query = "SELECT * FROM user_orders WHERE order_id = '$user_fetch[order_id]'";
                                    $order_result = $conn->query($order_query);
                                    while($order_fetch = mysqli_fetch_assoc($order_result)){
                                        echo "
                                            <tr>
                                                <td>$order_fetch[itemname]</td>
                                                <td>$order_fetch[price]</td>
                                                <td>$order_fetch[qty]</td>
                                            </tr>
                                        ";
                                    }

                                echo "
                                        </tbody>
                                        </table>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>