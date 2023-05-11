<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./cart.css?v=<?php echo time(); ?>">
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
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="cart_header name" colspan="3">Sản phẩm</th>
                                <th class="cart_header price">Giá</th>
                                <th class="cart_header quantity">Số lượng</th>
                                <th class="cart_header"></th>
                            </tr>
                        </thead>
                        <tbody>			
                            <?php
                                include ("../connect.php");         
                                
                                $userID = $_SESSION['userID'];                          
                                $query = "select * from cart where user_ID = '$userID'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) == 0) {
                                    echo  " <tr class=\"cart_item\">
                                                <td class=\"item item_remove\">
                                                    Chưa có sản phẩm
                                                </td>
                                            </tr>";
                                } else {
                                    while($row = $result->fetch_assoc()) {
                                        $getProduct = "select * from book where book_ID = '".$row['book_ID']."'";
                                        $secondResult = mysqli_query($conn, $getProduct);
                                        while ($data = $secondResult->fetch_assoc()) {
                                            echo "<tr class=\"cart_item\">
                                                    <td class=\"item item_remove\">
                                                        <button onclick=\"handleRemove('".$data['book_ID']."', '$userID')\" class=\"remove_button\">x</button>
                                                    </td>
                                                    <td class=\"item item_image\">
                                                        <img src=".$data['book_image']." class=\"book_image\"/>                                                  
                                                    </td>
                                                    <td class=\"item item_infor\">
                                                        <span class=\"item_name\">".$data['book_name']."</span>
                                                    </td>
                                                    <td class=\"item item_price\">
                                                        <span>".$data['book_price']."</span>                      
                                                    </td>
                                                    <td class=\"item item_buy\">
                                                        <button onclick=\"handleShowModal()\" class=\"buy_button\">
                                                            Mua
                                                        </button>
                                                    </td>
                                                </tr>";
                                                $getUser = "select * from users where user_ID = '$userID'";
                                                $resultGetUser = mysqli_query($conn, $getUser);
                                                while($value = $resultGetUser -> fetch_assoc()) {
                                                    echo "
                                                    <div id=\"modal_buy\" class=\"modal\">
                                                        <div class=\"modal_container\">
                                                            <h3 class=\"modal_container-heading\">
                                                                Xác nhận đơn hàng
                                                            </h3>
                                                            <div class=\"modal_container-body modal_buy_container-body\">
                                                                <div id=\"invoice_form\" class=\"body_form form_enable\">
                                                                    <label class=\"input_label\">Họ và tên</label>
                                                                    <input value='".$value['user_name']."' type=\"text\" class=\"input_modal email_input\" name=\"name\" require>
                                                                    <label class=\"input_label\">Email</label>
                                                                    <input value='".$value['user_email']."' placeholder=\"Email\" type=\"email\" class=\"input_modal email_input\" name=\"email\" require>
                                                                    <label class=\"input_label\">Địa chỉ nhận hàng</label>
                                                                    <input value='".$value['user_address']."' placeholder=\"Địa chỉ\" type=\"text\" class=\"input_modal address_input\" name=\"address\" require>   
                                                                    <label class=\"input_label\">Tên sản phẩm</label>
                                                                    <input value='".$data['book_name']."' placeholder=\"Tên sản phẩm\" type=\"text\" class=\"input_modal email_input\" name=\"product\" readonly>    
                                                                    <label class=\"input_label\">Số lượng</label>
                                                                    <input id=\"amount_modal\" class=\"input_modal amount_input\">                  
                                                                    <div class=\"form_action\">
                                                                        <button onclick=\"handleCloseModal()\" id=\"cancel_button\" name=\"cancel\" class=\"form_button cancel_button\">Huỷ</button>
                                                                        <button onclick=\"handleBuyProduct('".$value['user_ID']."', '".$data['book_ID']."')\" id=\"buy_button\" name=\"submit\" class=\"form_button buy_button\">Xác nhận</button>
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                }
                                        }
                                    }
                                }
                            ?>                         													
                        </tbody>
                    </table>                
                </div>
            </div>     
        </div>
        <?php include("../footer/footer.php")?>     
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="./cartJs.js?v=<?php echo time(); ?>"></script>
    <script src="../assets/JS/main.js?v=<?php echo time(); ?>"></script>
    <script src="../assets/JS/authJS.js?v=<?php echo time(); ?>"></script>
</body>
</html>
            