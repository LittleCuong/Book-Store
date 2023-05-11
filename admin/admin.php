<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/grid.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./admin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/responsive.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.0.0-web/css/all.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="app">
        <?php include("../header/header.php");?>
        <div class="container">
            <div class="grid wide">
                <div class="row sm-gutter app_content"> 
                    <div class="col l-12 m-12 c-12 body_container">       
                        <div class="manage_wrapper manage_user">
                            <h3 class="manage_wrapper-header">Quản lý khách hàng</h3>
                            <div class="row sm-gutter">
                                <div class="col l-6 m-12 c-12">
                                    <form class="add_wrapper add_user-wrapper">
                                        <div class="input_wrapper">
                                            <label class="input_label">Họ và tên:</label>
                                            <input id="name_input" type="text" class="input" name="name" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Địa chỉ email:</label>
                                            <input id="email_input" type="email" class="input" name="email" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Mật khẩu:</label>
                                            <input id="password_input" type="password" class="input" name="password" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Địa chỉ nhận hàng:</label>
                                            <input id="address_input" type="text" class="input" name="address" required>
                                            <button id="add_user" class="add_button button">THÊM KHÁCH HÀNG</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="remove_wrapper remove_user-wrapper">
                                        <div class="input_wrapper">
                                            <label class="input_label">Mã số khách hàng:</label>
                                            <input id="userID_input-rm" type="text" class="input" name="ID" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Họ và tên:</label>
                                            <input id="name_input-rm" type="text" class="input" name="name" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Địa chỉ email:</label>
                                            <input id="email_input-rm" type="text" class="input" name="email" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Địa chỉ nhận hàng:</label>
                                            <input id="address_input-rm" type="text" class="input" name="address" required>
                                            <button id="remove_user" class="remove_button button">XOÁ KHÁCH HÀNG</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="manage_wrapper manage_book">
                            <h3 class="manage_wrapper-header">Quản lý sản phẩm</h3>
                            <div class="row sm-gutter">
                                <div class="col l-6 m-12 c-12">
                                    <form class="add_wrapper add_product-wrapper">
                                        <div class="input_wrapper">
                                            <label class="input_label">Tên sản phẩm:</label>
                                            <input id="bookName_input" type="text" class="input" name="name" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Tác giả:</label>
                                            <input id="author_input" type="text" class="input" name="author" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Giá:</label>
                                            <input id="price_input" type="text" class="input" name="price" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Nhà xuất bản:</label>
                                            <input id="publisher_input" type="text" class="input" name="publisher" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Thể loại:</label>
                                            <select id="category_list" class="input category_list" onchange="handleChange(this.value)">
                                                <?php
                                                    include ("../connect.php");

                                                    $query = "select * from category";
                                                    $result = mysqli_query($conn, $query);

                                                    while($row = $result -> fetch_assoc()) {
                                                        echo "<option value=".$row['category_ID'].">".$row['category_name']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Hình ảnh:</label>
                                            <input id="image_input" type="text" class="input" name="image" required placeholder="../assets/img/ten_anh.jpg">
                                            <button id="add_product" class="add_button button">THÊM SẢN PHẨM</button>
                                        </div>
                                    </form>                                 
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="remove_wrapper remove_product-wrapper">
                                        <div class="input_wrapper">
                                            <label class="input_label">Mã số sản phẩm:</label>
                                            <input id="bookID_input-rm" type="text" class="input" name="ID" required>
                                        </div>
                                        <div class="input_wrapper">
                                            <label class="input_label">Tên sản phẩm:</label>
                                            <input id="bookName_input-rm" type="text" class="input" name="name" required>
                                            <button id="remove_product" class="remove_button button">XOÁ SẢN PHẨM</button>
                                        </div>
                                    </div>   
                                    <div class="update_wrapper">
                                        <h3 class="update_header">Cập nhật thông tin sản phẩm</h3>
                                        <div class="input_wrapper update_input-wrapper">
                                            <input id="search_input" placeholder="Nhập ID sản phẩm" type="text" class="input search_input" name="ID" required>
                                            <button onclick="handleSearch()" class="search_button">Tìm kiếm</button>
                                        </div>
                                        <div id="container"></div>
                                    </div>                                
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>    
            <?php include("../footer/footer.php");?>
            <?php include("../modal/modal.php");?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="../assets/JS/main.js?v=<?php echo time(); ?>"></script>             
    <!-- <script src="../assets/JS/authJS.js?v=<?php echo time(); ?>"></script>         -->
    <script src="./adminJS.js?v=<?php echo time(); ?>"></script>        
</body>
</html>
