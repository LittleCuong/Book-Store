<?php
    include ("../connect.php");
    $bookID = $_GET['book'];
    $getBook = "select book_name from book where book_ID = '$bookID'";
    $resultGetBook = mysqli_query($conn, $getBook);
    while($rowGetBook = $resultGetBook -> fetch_assoc()) {
        $userID = $_SESSION['userID'];
        $query = "select * from users where user_ID = '$userID'";
        $result = mysqli_query($conn, $query);
        while($row = $result -> fetch_assoc()) {
            echo "<div id=\"modal_buy\" class=\"modal\">
                    <div class=\"modal_container\">
                        <h3 class=\"modal_container-heading\">
                            Xác nhận đơn hàng
                        </h3>
                        <div class=\"modal_container-body modal_buy_container-body\">
                            <div id=\"invoice_form\" class=\"body_form form_enable\">
                                <label class=\"input_label\">Họ và tên</label>
                                <input value='".$row['user_name']."' type=\"text\" class=\"input_modal email_input\" name=\"name\" require>
                                <label class=\"input_label\">Email</label>
                                <input value='".$row['user_email']."' placeholder=\"Email\" type=\"email\" class=\"input_modal email_input\" name=\"email\" require>
                                <label class=\"input_label\">Địa chỉ nhận hàng</label>
                                <input value='".$row['user_address']."' placeholder=\"Địa chỉ\" type=\"text\" class=\"input_modal address_input\" name=\"address\" require>   
                                <label class=\"input_label\">Tên sản phẩm</label>
                                <input value='".$rowGetBook['book_name']."' placeholder=\"Tên sản phẩm\" type=\"text\" class=\"input_modal email_input\" name=\"product\" readonly>    
                                <label class=\"input_label\">Số lượng</label>
                                <input id=\"amount_input\" class=\"input_modal amount_input\" value=\"1\">                  
                                <div class=\"form_action\">
                                    <button onclick=\"handleCloseModal()\" id=\"cancel_button\" name=\"cancel\" class=\"form_button cancel_button\">Huỷ</button>
                                    <button onclick=\"handleBuyProduct('".$row['user_ID']."', '$bookID')\" id=\"buy_button\" name=\"submit\" class=\"form_button buy_button\">Xác nhận</button>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
    }
?>

<!-- method=\"POST\" action=\"../assets/mainPHP/mainPHP.php\" -->
<!-- type=\"submit\" -->