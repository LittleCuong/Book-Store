<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css?v=<?php echo time(); ?>"">
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo time(); ?>"">
    <link rel="stylesheet" href="../assets/css/grid.css?v=<?php echo time(); ?>"">
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?php echo time(); ?>"">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css?v=<?php echo time(); ?>"">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.0.0-web/css/all.css?v=<?php echo time(); ?>"">
</head>
<body>
    <div class="app">
        <?php include("../header/header.php");?>
        <div class="container">
            <div class="grid wide">
                <?php include("../banner/banner.php");?>
                <div class="row sm-gutter app_content">
                    <div class="col l-2 m-0 c-0">                        
                       <nav class="category">
                            <h3 class="heading_category">
                                <i class="category_icon-heading fa-solid fa-list"></i>
                                Danh mục
                            </h3>   
                            <ul class="category_list">
                                <?php include("../sidebar/sidebar.php")?>
                            </ul> 
                        </nav>
                    </div>   
                    <div class="col l-10 m-12 c-12">
                        <div class="home-filter hide-on-mo-tab">
                            <span class="home-filter_label">Sắp xếp theo</span>
                            <button class="tabs-item home-filter_btn btn btn--primary" onclick="handleFilterPrice('popular')">Phổ biến</button>
                            <div class="select-input">
                                <span class="select-input_label">Giá</span>
                                <i class="select-input_icon fas fa-angle-down"></i>
                                <ul class="select-input_list">
                                    <li class="select-input_item" onclick="handleFilterPrice('ascending')">
                                        <span class="select-input_link">Giá: Thấp đến cao</span>
                                    </li>
                                    <li class="select-input_item" onclick="handleFilterPrice('descending')">
                                        <span class="select-input_link">Giá: Cao đến thấp</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row sm-gutter" id="list">
                            <?php
                                include ("../connect.php");
                                $query = "select * from book";
                                $result = mysqli_query($conn, $query);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class=\"col l-2-4 m-4 c-6\">
                                            <a class=\"home-product-item\" href=\"../detail/detail.php?book=".$row['book_ID']." \">
                                                <img src=".$row['book_image']." class=\"item-img\"/>                                                  
                                                <h4 class=\"home-product-item_name\">".$row['book_name']."</h4>
                                                <div class=\"home-product-item_price\">
                                                    <span class=\"home-product-item_price-promo\">".$row['book_price']." đ</span>
                                                </div>                                               
                                                <div class=\"home-product-item_origin\">
                                                    <span class=\"home-product-item_origin-brand\">".$row['book_author']."</span>                                  
                                                </div>
                                            </a>
                                        </div>";
                                }
                            ?>                   
                        </div>                         
                        </div>  
                    </div>
                </div>
            </div>     
        </div>
        <?php include("../footer/footer.php");?>
        <?php include("../modal/modal.php");?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="../assets/JS/main.js?v=<?php echo time(); ?>"></script>        
    <script src="./homeJS.js?v=<?php echo time(); ?>"></script>        
    <script src="../assets/JS/authJS.js?v=<?php echo time(); ?>"></script>        
</body>
</html>