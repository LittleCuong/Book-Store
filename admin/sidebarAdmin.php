<?php
    include "../connect.php";

    echo "  <li class=\"category_item\">
                <span id=\"category\" class=\"category_item-link\" onclick=\"handleChooseCategory(\"user\")\">Quản lý khách hàng</span>
            </li>
            <li class=\"category_item\">
                <span id=\"category\" class=\"category_item-link\" onclick=\"handleChooseCategory(\"product\")\">Quản lý sản phẩm</span>
            </li>
            <li class=\"category_item\">
                <span id=\"category\" class=\"category_item-link\" onclick=\"handleChooseCategory(\"invoice\")\">Quản lý hoá đơn</span>
            </li>
    ";
?>