<?php
session_start();
include('./database/connection.php');
?>
    <?php

    $sql = "SELECT * FROM product WHERE categories_id = '3' ";
    $sql_run = $conn->query($sql);


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <!-- custom css -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/book.css">


        <!-- icons bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
        <?php
        include('./inc/header.php');
        ?>

        <!-- category selection -->
        <?php
        include('./inc/categories.php');
        ?>

        <!-- selling -->
        <section class="selling">
            <h1>Category : Cassete</h1>
            <?php
            include('./inc/sellingcards.php');
            ?>
        </section>

        <!-- footer -->
        <?php
        include('./inc/footer.php');
        ?>
    </body>

    </html>
<?php
