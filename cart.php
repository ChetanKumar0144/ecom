<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 12rem;
        }

        .scroll {
            margin: .2rem;
            height: 75vh;
            overflow-y: scroll;
        }

        table {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <?php
    include('./inc/header.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light">
                <h1>My Cart</h1>
            </div>
            <div class="col-9">
                <div class="scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $sr = $key + 1;
                                    echo "
                                    <tr>
                                    <td>$sr</td>
                                    <td>$value[pname]</td>
                                    <td>$value[prate]<input type='hidden' class='iprice' value='$value[prate]'></td>
                                    <td>
                                        <form action='./php_actions/code.php' method='POST' >
                                            <input type='number' class='text-center iqty' name='modQty' onchange='this.form.submit()' value='$value[qty]' min ='1' max='10'>
                                            <input type='hidden' name='itemName' value='$value[pname]'>
                                        </form>
                                    </td>
                                    <td class='itotal'></td>    
                                    <td>
                                        <form action='./php_actions/code.php' method='POST' >
                                            <button class='btn btn-sm btn-outline-danger' name='remove_item'>Remove</button>
                                               <input type='hidden' name='itemName' value='$value[pname]'>
                                        </form>
                                    </td>
                                    </tr>
                                ";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="border bg-light mt-2 rounded p-4">
                    <h4>Grand Total: </h4>
                    <h5 class="text-right" id="gtotal"></h5>
                    <br>
                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    ?>
                        <form action="./php_actions/code.php" method="POST">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymode" value="COD" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault">
                                    Cash on Delivery
                                </label>
                            </div>
                            <br>
                            <button name="purchase" class="btn btn-primary btn-block">Make Payment</button>
                        </form>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iqty = document.getElementsByClassName('iqty');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerHTML = (iprice[i].value) * (iqty[i].value);
                gt = gt + (iprice[i].value) * (iqty[i].value);
            }
            gtotal.innerText = gt;
            /* 
             price 650 qty 1  gt=0+(650*1)

             price 750 qty 2 gt=650+(750*2) === 650+1500=2150

             price 850 qty 1 gt=2150+(850*1) === 2150+850=3000
            */
        }
        subTotal();
    </script>
</body>

</html>