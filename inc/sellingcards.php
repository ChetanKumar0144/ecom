<div class="row">
            <?php
                $count = $sql_run->num_rows;
                if($count>0){
                    while($row = $sql_run->fetch_assoc()){
                        $img = $row['product_image'];
                        $name = $row['product_name'];
                        $price = $row['rate'];
                        ?>
                            <div class="cards">
                                <form action="./php_actions/code.php" method="POST">
                                    <img src="<?php echo $img ?>" alt="">
                                    <p>$<?php echo $price ?></p>
                                    <p><b><?php echo $name ?></b></p>
                                    <p>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </p>
                                    <p><input style="width: 7rem; background:transparent;outline:none;border:1px solid black;border-radius:.2rem ;padding:.2rem" type="number" name="qty" min ='1' max='10' name="qty" placeholder="Quantity" required></p>
                                    <input type="hidden" name="pname" value="<?php echo $row['product_name'] ?>">
                                    <input type="hidden" name="prate" value="<?php echo $row['rate'] ?>">
                                    <button type="submit" name="addcart">Add To Cart</button>
                                </form>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
        