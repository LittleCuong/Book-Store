<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./detail.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/grid.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.0.0-web/css/all.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.0.0-web/css/all.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="app">
        <?php include("../header/header.php")?>
        <div class="container">
            <div class="grid wide">
                <div class="row sm-gutter wrapper">
                    <?php 
                        include "../connect.php";
                        
                        if(isset($_SESSION['userID'])) {
                            $userID = $_SESSION['userID'];
                        } else {
                            $userID = 'none';
                        }
                                                                       
                        $bookID = $_GET['book'];
                        $query = "SELECT *, category_name FROM book AS b 
                                JOIN category AS c ON c.category_ID = b.category_ID
                                where b.book_ID = '$bookID'";
                        $result = mysqli_query($conn, $query);
                        while($row = $result -> fetch_assoc()) {
                            echo "
                                <div class=\"col l-4 m-12 c-12\" style=\"height: 600px\">   
                                    <div class=\"wrapper_image\">
                                        <img src=".$row['book_image']." class=\"image\"/>
                                    </div>
                                    <div class=\"wrapper_action\">
                                        <button onClick=\"addToCart('$userID', '$bookID') \" class=\"button btn_cart\">Thêm vào giỏ hàng</button>
                                        <button id=\"buttonBuy\" onClick=\"buyProduct('$userID', '$bookID') \" class=\"button btn_buy\">Mua ngay</button>
                                    </div>
                                </div>
                                <div class=\"col l-8 m-12 c-12\">   
                                    <div class=\"wrapper_main\">
                                        <h3 class=\"wrapper_main-header\">".$row['book_name']."</h3>
                                        <div class=\"wrapper_main-body\">
                                            <div class=\"wrapper_main-body--item\">
                                                <div style=\"display: flex; \">
                                                    <span class=\"first_item\">Nhà xuất bản:</span>
                                                    <span class=\"second_item\">".$row['book_publisher']."</span>                                                
                                                </div>
                                                <div style=\"display: flex; margin-top: 15px; \">
                                                    <span class=\"first_item\">Thể loại:</span>
                                                    <span class=\"second_item\">".$row['category_name']."</span>                                                
                                                </div>
                                                <div style=\"margin-top: 15px; \">
                                                    <i class=\"fa-regular fa-star checked\"></i>
                                                    <i class=\"fa-regular fa-star checked\"></i>
                                                    <i class=\"fa-regular fa-star checked\"></i>
                                                    <i class=\"fa-regular fa-star checked\"></i>
                                                    <i class=\"fa-regular fa-star checked\"></i>
                                                </div>
                                                <div style=\"display: flex; margin-top: 15px; \">
                                                    <span class=\"second_item price\">".$row['book_price']." đ</span>                                                
                                                </div>                                            
                                            </div>
                                            <div class=\"wrapper_main-body--item\">
                                                <span class=\"first_item\">Tác giả:</span>
                                                <span class=\"second_item\">".$row['book_author']."</span>
                                            </div>
                                        </div>
                                    </div>           
                                </div>
                            ";
                        }
                    ?>                                     
                    </div>
                </div>
            </div>     
        </div>
        <?php include("../footer/footer.php");?>
        <?php include("../modal/modal.php");?>
        <?php include("../modalBuyProduct/modalBuyProduct.php");?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="./detailJs.js?v=<?php echo time();?>"></script>
    <script src="../assets/JS/authJS.js?v=<?php echo time();?>"></script>
    <script src="../assets/JS/main.js?v=<?php echo time();?>"></script>    
</body>
</html>
