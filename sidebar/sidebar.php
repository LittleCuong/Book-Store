<?php
    include "../connect.php";

    $query = "select * from category";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        echo "  <li class=\"category_item\">
                    <span id=\"category\" class=\"category_item-link\" onclick=\"handleChooseCategory(".$row['category_ID'].")\">".$row['category_name']."</span>
                </li>";
    }
?>