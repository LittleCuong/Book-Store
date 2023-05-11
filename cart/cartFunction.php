<?php
    switch ($_POST['action']) {
        case 'removeFromCart':
            removeFromCart();
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
        if ($result) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    function removeFromCart() {
        include ("../connect.php");

        $userID = $_POST['userID'];
        $bookID = $_POST['bookID'];

        $query = "delete from cart where user_ID = '$userID' and book_ID = '$bookID'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "success";
        } else {
            echo "failed";
        }
    }
?>