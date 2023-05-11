<?php
    session_start();

    if (isset($_POST['login'])) {
        handleLogin();
    } 

    if (isset($_POST['register'])) {
        handleRegister();
    }


    if (isset($_POST['search'])) {
        handleSearch();
    }

    if (isset($_POST['logout'])) {
        handleLogOut();
    }

    // switch ($_POST['action']) {
    //     case 'search':
    //         handleSearch();
    //         break;
    //     case 'logout':
    //         handleLogOut();
    //         break;
    // }

    function handleLogin() {
        include ("../../connect.php");
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from users where user_email = '$email' and user_pass = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userID'] = $row['user_ID'];
            if ($row['user_ID'] == 'ADMIN') {
                echo "<script type='text/javascript'>window.location.href = '../../admin/admin.php';</script>";
            } else {
                echo "<script type='text/javascript'>window.location.href = '../../home/home.php';</script>";
            }
        } else {
            echo "  <script type='text/javascript'>
                        window.location.href = '../../home/home.php';
                        alert('Thông tin tài khoản không tồn tại!');
                    </script>";
        }
    }


    function handleRegister() {
        include ("../../connect.php");
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $checkExisted = "select user_email from users where user_email = '$email'";
        $resultOfCheck = mysqli_query($conn, $checkExisted);
        if (mysqli_num_rows($resultOfCheck) == 0) {
            if ($password == $_POST['re_password']) {
                $query = "insert into users values ('', '$name', '$password', '$email', '$address')";
                $result = mysqli_query($conn, $query);
                echo "  <script type='text/javascript'>
                            alert('Đăng ký thành công mời bạn đăng nhập lại!');
                            window.location.href = '../../home/home.php';          
                        </script>";
            } else {
                echo "  <script type='text/javascript'>
                            window.location.href = '../../home/home.php';
                            alert('Mật khẩu không trùng khớp!');
                        </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    window.location.href = '../../home/home.php';
                    alert('Địa chỉ email đã được sử dụng!');
                 </script>";
        }
    }

    function handleSearch() {
        include ("../../connect.php");

        $keyword = $_POST['search'];
        $query = "select * from book where book_name LIKE '%$keyword%'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = $result -> fetch_assoc()) {
                echo "  <div class=\"search_result-item\">
                            <a class=\"result-item\" href=\"../detail/detail.php?book=".$row['book_ID']." \">
                                <img src=".$row['book_image']." class=\"result_item-img\"/>                                                  
                                <h4 class=\"result-item_name\">".$row['book_name']."</h4>
                            </a>
                        </div>";
            }
        }
    }

    function handleLogOut() {
        session_destroy();
        echo "success";
    }
?>