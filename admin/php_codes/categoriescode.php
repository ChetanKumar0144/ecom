<?php
    session_start();
    include('http://localhost/music%20store/database/connection.php');
?>
<?php
    if(isset($_POST['addcate'])){
        $addcate= mysqli_real_escape_string($conn,$_POST['addcate']);
        $select_status = mysqli_real_escape_string($conn,$_POST['select_status']);
        $query = "SELECT * FROM categories WHERE categories_name = '$addcate'";
        $sql = $conn->query($query);
        if($sql->num_rows>0){
            echo "<script>
                alert('category already exist.');
                window.location.replace('../categories.php');
            </script>";
        }
        else{
            $iquery = "INSERT INTO categories";
            $isql = $conn->query($iquery);
            if($isql){
                echo "<script>
                alert('category added.');
                window.location.replace('../categories.php');
            </script>";
            }
            else{
                echo "error occurs";
                header('../categories.php');
            }
        }
    }
?>