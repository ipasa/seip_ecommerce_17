<?php
require 'application.php';
$categories = select_all_published_category();
?>

<div class="menu">
    <div class="container">
        <div class="menu_box">
            <ul class="megamenu skyblue">
                <li class="active grid"><a class="color2" href="index.php">Home</a></li>

                <!--<li><a class="color4" href="category.php">Category</a></li>-->
                <li><a class="color4" href="category.php">Category</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Categories</h4>
                                    <ul>
                                        <?php
                                        if (mysqli_num_rows($categories) > 0) {
                                            while ($row = mysqli_fetch_assoc($categories)) {
                                                ?>
                                                <li>
                                                    <a href="men.html">
                                                        <?php echo $row['category_name']; ?>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                        } else {
                                            echo "Sorry, No category found in this application";
                                        }
                                        ?>
                                    </ul>	
                                </div>							
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <a class="color10" href="#">Men Fashion</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Men</h4>
                                    <ul>
                                        <li><a href="men.html">Jackets</a></li>
                                        <li><a href="men.html">Blazers</a></li>
                                        <li><a href="men.html">Suits</a></li>
                                        <li><a href="men.html">Trousers</a></li>
                                        <li><a href="men.html">Jeans</a></li>
                                        <li><a href="men.html">Shirts</a></li>
                                        <li><a href="men.html">Sweatshirts & Hoodies</a></li>
                                        <li><a href="men.html">Swem Wear</a></li>
                                        <li><a href="men.html">Accessories</a></li>
                                    </ul>	
                                </div>							
                            </div>

                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Women</h4>
                                    <ul>
                                        <li><a href="men.html">Outerwear</a></li>
                                        <li><a href="men.html">Dresses</a></li>
                                        <li><a href="men.html">Handbags</a></li>
                                        <li><a href="men.html">Trousers</a></li>
                                        <li><a href="men.html">Jeans</a></li>
                                        <li><a href="men.html">T-Shirts</a></li>
                                        <li><a href="men.html">Shoes</a></li>
                                        <li><a href="men.html">Coats</a></li>
                                        <li><a href="men.html">Accessories</a></li>
                                    </ul>	
                                </div>							
                            </div>

                            <div class="col2">
                                <div class="h_nav">
                                    <h4>Trends</h4>
                                    <ul>
                                        <li class>
                                            <div class="p_left">
                                                <img src="images/t1.jpg" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="p_right">
                                                <h4><a href="#">Denim shirt</a></h4>
                                                <span class="item-cat"><small><a href="#">Jackets</a></small></span>
                                                <span class="price">29.99 $</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </li>
                                        <li>
                                            <div class="p_left">
                                                <img src="images/t2.jpg" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="p_right">
                                                <h4><a href="#">Denim shirt</a></h4>
                                                <span class="item-cat"><small><a href="#">Jackets</a></small></span>
                                                <span class="price">29.99 $</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </li>
                                        <li>
                                            <div class="p_left">
                                                <img src="images/t3.jpg" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="p_right">
                                                <h4><a href="#">Denim shirt</a></h4>
                                                <span class="item-cat"><small><a href="#">Jackets</a></small></span>
                                                <span class="price">29.99 $</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </li>
                                    </ul>	
                                </div>												
                            </div>
                        </div>
                    </div>
                </li>

                <!--<li><a class="color3" href="404.html">Accessories</a></li>-->

                <li><a class="color7" href="#">Women's Fashion</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Men</h4>
                                    <ul>
                                        <li><a href="men.html">Jackets</a></li>
                                        <li><a href="men.html">Blazers</a></li>
                                        <li><a href="men.html">Suits</a></li>
                                        <li><a href="men.html">Trousers</a></li>
                                        <li><a href="men.html">Jeans</a></li>
                                        <li><a href="men.html">Shirts</a></li>
                                        <li><a href="men.html">Sweatshirts & Hoodies</a></li>
                                        <li><a href="men.html">Swem Wear</a></li>
                                        <li><a href="men.html">Accessories</a></li>
                                    </ul>	
                                </div>							
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Women</h4>
                                    <ul>
                                        <li><a href="men.html">Outerwear</a></li>
                                        <li><a href="men.html">Dresses</a></li>
                                        <li><a href="men.html">Handbags</a></li>
                                        <li><a href="men.html">Trousers</a></li>
                                        <li><a href="men.html">Jeans</a></li>
                                        <li><a href="men.html">T-Shirts</a></li>
                                        <li><a href="men.html">Shoes</a></li>
                                        <li><a href="men.html">Coats</a></li>
                                        <li><a href="men.html">Accessories</a></li>
                                    </ul>	
                                </div>							
                            </div>
                            <div class="col2">
                                <div class="h_nav">
                                    <h4>Trends</h4>
                                    <ul>
                                        <li class>
                                            <div class="p_left">
                                                <img src="images/t1.jpg" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="p_right">
                                                <h4><a href="#">Denim shirt</a></h4>
                                                <span class="item-cat"><small><a href="#">Jackets</a></small></span>
                                                <span class="price">29.99 $</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </li>
                                        <li>
                                            <div class="p_left">
                                                <img src="images/t2.jpg" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="p_right">
                                                <h4><a href="#">Denim shirt</a></h4>
                                                <span class="item-cat"><small><a href="#">Jackets</a></small></span>
                                                <span class="price">29.99 $</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </li>
                                        <li>
                                            <div class="p_left">
                                                <img src="images/t3.jpg" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="p_right">
                                                <h4><a href="#">Denim shirt</a></h4>
                                                <span class="item-cat"><small><a href="#">Jackets</a></small></span>
                                                <span class="price">29.99 $</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </li>
                                    </ul>	
                                </div>												
                            </div>
                        </div>
                    </div>
                </li>
                <li><a class="color8" href="blog.php">Blog</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
    </div>
</div>