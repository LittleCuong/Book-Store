<?php
    include "../connect.php";

    $id = $_POST['category'];
    $query = "select * from book where category_ID = '$id'";
    $result = mysqli_query($conn, $query);

    while($row = $result -> fetch_assoc()) {
        echo "  <div class=\"col l-2-4 m-4 c-6\">
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