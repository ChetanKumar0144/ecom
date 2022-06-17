<?php

use function PHPSTORM_META\type;

require_once('../database/connection.php');
?>
<!-- registration form code -->
<?php
    if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $select = "SELECT * FROM users WHERE email = '$email'";
    $selectquery = $conn->query($select);
    $countemail = $selectquery->num_rows;
    if ($countemail > 0) {
    ?>
        <script>
            alert('email already exist. Please try with new one.');
            location.replace('../login.php');
        </script>
        <?php
    } else {
        if ($password != $cpass) {
        ?>
            <script>
                alert('Password doesn\'t match with confrm password. Please re-enter password');
                location.replace('../login.php');
            </script>
            <?php
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);

            $insert = "INSERT INTO users (`name`, `email`, `password` , `phone`) VALUES ('$name','$email','$hash','$phone')";
            $insertquery = $conn->query($insert);

            if ($insertquery) {
            ?>
                <script>
                    alert('Data is aved succesfully. Please login for further actions.');
                    location.replace('../login.php');
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Something went wrong! Please try again later.');
                    location.replace('../login.php');
                </script>
    <?php
            }
        }
    }
    }
?>

<!-- login form -->
<?php
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        
        if($email== "owner@owner.com" && $password == "owner@owner"){
            $_SESSION['username'] = "admin";
            ?>
                <script>
                    window.location.replace('../admin/index.php');
                </script>
            <?php
        }else{
            $select = "SELECT * FROM users WHERE email= '$email'";
        $selectquery = $conn->query($select);

        $countemail = $selectquery->num_rows;
        if($countemail>0){
            $fetch = $selectquery->fetch_assoc();
            $pass = $fetch['password'];

            $verifypass = password_verify($password , $pass);
            if($verifypass == $password){
                session_start();
                $_SESSION['username'] = $fetch['name'];
                ?>
                    <script>
                        alert('We are very happy to see you.');
                        location.replace('../index.php');
                    </script>
                <?php 
            }else{
                ?>
                <script>
                    window.location.replace('../login.php');
                    alert('Invalid Password. Please try again later.');
                </script>
               <?php
            }
        }else{
           ?>
            <script>
                window.location.replace('../login.php');
                alert('Invalid Email Address. Please try new One.');
            </script>
           <?php
        }
        }
    }
?>

<!-- cart -->
<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['addcart'])){
            if(isset($_SESSION['cart'])){
                $myItems = array_column($_SESSION['cart'],'pname');
                if(in_array($_POST['pname'],$myItems)){
                    echo "<script>
                        alert('item already added');
                        window.location.replace('../index.php');
                    </script>";
                }
                else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array("pname"=>$_POST['pname'],"prate"=>$_POST['prate'],"qty"=>$_POST['qty']);
                echo "<script>
                        alert('item added');
                        window.location.replace('../index.php');
                    </script>";
                }
            }
            else{
                $_SESSION['cart'][0]= array("pname"=>$_POST['pname'],"prate"=>$_POST['prate'],"qty"=>"1");
                echo "<script>
                        alert('item added');
                        window.location.replace('../index.php');
                    </script>";
                print_r($_SESSION['cart']);
            }
        }

        if(isset($_POST['remove_item'])){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['pname']==$_POST['itemName']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']= array_values($_SESSION['cart']);
                    echo "<script>
                        alert('Item Removed.');
                        window.location.replace('../cart.php');
                    </script>";
                }
            }
        }

        if(isset($_POST['modQty'])){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['pname']==$_POST['itemName']){
                    $_SESSION['cart'][$key]['qty']=$_POST['modQty'];
                    echo "<script>
                        
                        window.location.replace('../cart.php');
                    </script>";
                }
            } 
        }
    }

?>

<!-- purchase -->
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['purchase'])){
            if($_SESSION['username']){
                $name = mysqli_real_escape_string($conn,$_POST['fullname']);
                $phone = mysqli_real_escape_string($conn,$_POST['number']);
                $address = mysqli_real_escape_string($conn,$_POST['address']);
                $paymode = mysqli_real_escape_string($conn,$_POST['paymode']);
                $query1 = "INSERT INTO order_manager (fullname, phone, address, paymode) VALUES ('$name','$phone', '$address', '$paymode')";
                if(mysqli_query($conn,$query1)){
                    $order_id = mysqli_insert_id($conn);
                    $query2 = "INSERT INTO user_orders (order_id, itemname, price, qty) VALUES (?, ?, ?, ?)";
    
                    $stmt = mysqli_prepare($conn,$query2);
                    if($stmt){
                        mysqli_stmt_bind_param($stmt,"isii",$order_id, $ItemName, $Price, $Qty);
                        foreach($_SESSION['cart'] as $key => $value){
                            $ItemName = $value['pname'];
                            $Price = $value['prate'];
                            $Qty = $value['qty'];
    
                            mysqli_stmt_execute($stmt);
                        }
                        unset($_SESSION['cart']);
                        echo "<script>
                            alert('Order Placed');
                            window.location.replace('../index.php');
                        </script>";
                    }else{
                        echo <<<stmt
                            <script>
                                alert('erroe found in stmt');
                                window.location.replace('../cart.php');
                            </script>
                        stmt;
                    }
                }else{
                    echo <<< query1
                        <script>
                            alert('error');
                            window.location.replace('../cart.php');
                        </script>
                    query1;
                }
            }else{
                ?>
                    <script>
                        alert('To purchase it, Login fisrt...');
                        window.location.replace('../login.php');
                    </script>
                <?php
            }           
        }
    }
?>