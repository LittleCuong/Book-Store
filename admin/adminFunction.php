<?php
    switch ($_POST['action']) {
        case 'addUser':
            handleAddUser();
            break;
        case 'removeUser':
            handleRemoveUser();
            break;
        case 'addProduct':
            handleAddProduct();
            break;
        case 'removeProduct':
            handleRemoveProduct();
            break;
        case 'search':
            handleSearch();
            break;
        case 'update':
            handleUpdate();
            break;
    }

    function handleAddUser() {
        include ("../connect.php");

        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $checkExisted = "select user_email from users where user_email = '$email'";
        $resultOfCheck = mysqli_query($conn, $checkExisted);
        if (mysqli_num_rows($resultOfCheck) == 0) {
            $query = "insert into users values ('', '$name', '$password', '$email', '$address')";
            $result = mysqli_query($conn, $query);
            echo "success";
        } else {
            echo "existed";
        }
    }

    function handleRemoveUser() {
        include ("../connect.php");

        $userID = $_POST['ID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $query = "delete from users where user_ID = '$userID' and user_name = '$name' and user_email = '$email' and user_address = '$address'";
        $result = mysqli_query($conn, $query);
        if (mysql_affected_rows($result) > 0) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    function handleAddProduct() {
        include ("../connect.php");

        $name = $_POST['name'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $publisher = $_POST['publisher'];
        $category = $_POST['category'];
        $image = $_POST['image'];

        $query = "insert into book values ('', '$name', '$author', '$price', '$publisher', '$category', '$image')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    function handleRemoveProduct() {
        include ("../connect.php");

        $bookID = $_POST['ID'];
        $name = $_POST['name'];
        $query = "delete from book where book_ID = '$bookID' and book_name = '$name'";
        $result = mysqli_query($conn, $query);
        if (mysql_affected_rows($result) > 0) {
            echo "success";
        }
        else {
            echo "failed";
        }
    }

    function handleSearch() {
        include ("../connect.php");
        
        $bookID = $_POST['ID'];
        $query = "select * from book where book_ID = '$bookID'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = $result -> fetch_assoc()) {
                echo "  <div class=\"input_wrapper\">
                            <label class=\"input_label\">Tên sản phẩm:</label>
                            <input id=\"bookName_update\" type=\"text\" class=\"input\" name=\"name\" value='".$row['book_name']."'>
                        </div>  
                        <div class=\"input_wrapper\">
                            <label class=\"input_label\">Tên tác giả:</label>
                            <input id=\"bookAuthor_update\" type=\"text\" class=\"input\" name=\"name\" value='".$row['book_author']."'>
                        </div> 
                        <div class=\"input_wrapper\">
                            <label class=\"input_label\">Giá:</label>
                            <input id=\"bookPrice_update\" type=\"text\" class=\"input\" name=\"name\" value='".$row['book_price']."'>
                        </div>   
                        <div class=\"input_wrapper\">
                            <label class=\"input_label\">Nhà xuất bản:</label>
                            <input id=\"bookPublisher_update\" type=\"text\" class=\"input\" name=\"name\" value='".$row['book_publisher']."'>
                        </div> 
                        <div class=\"input_wrapper\">
                            <label class=\"input_label\">Thể loại(Manga, Tiểu thuyết, Khoa học, Lập trình):</label>
                            <input id=\"bookCategory_update\" type=\"text\" class=\"input\" name=\"name\">
                        </div>  
                        <div class=\"input_wrapper\">
                            <label class=\"input_label\">Hình ảnh:</label>
                            <input id=\"bookImage_update\" type=\"text\" class=\"input\" name=\"name\" value='".$row['book_image']."'>
                            <button onclick=\"handleUpdate('".$row['book_ID']."', '".$row['category_ID']."')\" class=\"update_button button\">CẬP NHẬT SẢN PHẨM</button>
                        </div>          
                        ";
            }
        } else {
            echo "failed";
        }
    }

    function handleUpdate() {
        include ("../connect.php");

        $bookID = $_POST['bookID'];
        $bookName = $_POST['bookName'];
        $bookAuthor = $_POST['bookAuthor'];
        $bookPrice = $_POST['bookPrice'];
        $bookPublisher = $_POST['bookPublisher'];
        $bookCategory = $_POST['bookCategory'];
        $bookImage = $_POST['bookImage'];

        switch (is_numeric($bookCategory)) {
            case true:
                $query = "update book set book_name = '$bookName', book_author = '$bookAuthor', book_price = '$bookPrice', book_publisher = '$bookPublisher', 
                            category_ID = '$bookCategory',
                            book_image = '$bookImage'
                            where book_ID = '$bookID'
                        ";
                $result = mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0 ) {
                    echo "success";
                } else {
                    echo "failed";
                }
                break;
            case false:
                $getCategoryID = "select category_ID from category where category_name = '$bookCategory'";
                $result = mysqli_query($conn, $getCategoryID);
                $row = mysqli_fetch_assoc($result);
                $query = "update book set book_name = '$bookName', book_author = '$bookAuthor', book_price = '$bookPrice', book_publisher = '$bookPublisher', 
                            category_ID = ".$row['category_ID'].",
                            book_image = '$bookImage'
                            where book_ID = '$bookID'
                        ";
                $result = mysqli_query($conn, $query);
                if (mysqli_affected_rows($conn) > 0 ) {
                    echo "success";
                } else {
                    echo "failed";
                }
                break;
        }

    }
?>