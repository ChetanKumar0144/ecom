<header>
    <div class="header-top">
        <p>Customer Support: +91 9999999999(Mon-Sat) | 10AM to 5PM</p>
    </div>
   <nav>
        <div class="logo">
            <h2>MUSIC STORE</h2>
        </div>
        <div class="search">
            <input type="search" name="search" id="" placeholder="Enter Here For Search">
        </div>
        <div class="menu">
            <a href="#">menu</a>
        </div>
        <div class="icons">
            <?php
            $count = 0;
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                }
            ?>
            <a href="cart.php"><i class="bi bi-bag-check-fill"></i> (<?php echo $count ?>)</a>
            <a href="#"><i class="bi bi-heart-fill"></i></a>
            <?php
                if(isset($_SESSION['username'])){    
                       echo "<a href='./logout.php'><span>Log Out </span><i class='bi bi-box-arrow-out-right'></i></a>";                  
                }else{
                    echo "<a href='./login.php' id='login'><span>Login </span><i class='bi bi-box-arrow-in-right'></i></a>";
                }
            ?>
        </div>
    </nav>
    <div class="header-bottom">
        <div class="header-bottom-items">
            <a href="index.php" class="active">Home</a>
            <a href="product.php">Musical Instruments</a>
            <a href="books.php">Music Books</a>
            <a href="cassete.php">Music Cassetes</a>
            <a href="#" class="offer">Offer Zone</a>
            <a href="#">Pro Audio</a>
        </div>
        <a href="#" class="loc"><i class="bi bi-geo-alt"></i> <span>Our Stores</span></a>
    </div>
</header>
        