<?php
    switch ($_POST['action']) {
        case 'addToCart':
            addToCart();
            break;
        case 'buy':
            buyProduct();
            break;
        
    }

    function buyProduct() {
        include ("../connect.php");

        $userID = $_POST['userID'];
        $bookID = $_POST['bookID'];
        $amount = $_POST['amount'];

        $query = "call buy_product('$userID', '$bookID', '$amount');";
        $result = mysqli_query($conn, $query);
    }

    function addToCart() {
        include ("../connect.php");

        $userID = $_POST['userID'];
        $bookID = $_POST['bookID'];
        $checkExisted = "select * from cart where user_ID = '$userID' and book_ID = '$bookID'";
        $result = mysqli_query($conn, $checkExisted);
        if (mysqli_num_rows($result) > 0) {
            echo 'existed';            
        } else {
            $addQuery = "insert into cart values ('$userID', '$bookID', 1)";
            $resultAdding = mysqli_query($conn, $addQuery);
            if ($resultAdding) {
                echo 'success';
            } else {
                echo 'failed';
            }
        }
    }
?>