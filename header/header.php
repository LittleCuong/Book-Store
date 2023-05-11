<?php
    session_start();
    if (isset($_SESSION['userID'])) {
        echo "
            <header class=\"header\">
                <div class=\"grid wide\">
                    <div class=\"wrapper_header\">
                        <div class=\"wrapper_header-logo\" onclick=\"handleRedirect('home')\">
                            <img src=\"../assets/img/green-book.jpg \" class=\"logo-image\"/>
                            <span class=\"logo-name\">Book Store</span>
                        </div>
                        <div 
                            id=\"search-form\"
                            class=\"wrapper_header-search\"
                        >
                            <div class=\"search-wrapper\">
                                <input id=\"search_input-header\" class=\"search-input\" type=\"text\" name=\"search\" placeholder=\"Tìm kiếm sách\">
                                <button onclick=\"handleSearchProduct()\" class=\"search-button\" name=\"search-button\">
                                    <img src=\"../assets/img/search-icon.png \" class=\"search-icon\"/>
                                </button>
                            </div>
                        </div>
                        <div class=\"wrapper_header-right\">                   
                            <button onclick=\"handleRedirect('cart') \" class=\"cart_link\">
                                <img src=\"../assets/img/shopping-cart.png \" class=\"wrapper_header-right--icon\"/>
                            </button>                  
                            <button onclick=\"handleLogOut()\" id=\"logoutButton\" class=\"cart_link logout_button\">
                                ĐĂNG XUẤT
                            </button>
                        </div>          
                        <div id=\"search_result\" class=\"search_result\"></div>
                    </div>           
                </div>
            </header>
        ";
    } else {
        echo "
            <header class=\"header\">
                <div class=\"grid wide\">
                    <div class=\"wrapper_header\">
                        <div class=\"wrapper_header-logo\" onclick=\"handleRedirect('home')\">
                            <img src=\"../assets/img/green-book.jpg \" class=\"logo-image\"/>
                            <span class=\"logo-name\">Book Store</span>
                        </div>
                        <div 
                            id=\"search-form\"
                            class=\"wrapper_header-search\"
                        >
                            <div class=\"search-wrapper\">
                                <input id=\"search_input-header\" class=\"search-input\" type=\"text\" name=\"search\" placeholder=\"Tìm kiếm sách\">
                                <button onclick=\"handleSearchProduct()\" class=\"search-button\" name=\"search-button\">
                                    <img src=\"../assets/img/search-icon.png \" class=\"search-icon\"/>
                                </button>
                            </div>
                        </div>
                        <div class=\"wrapper_header-right\">                   
                            <button id=\"loginButton\" class=\"cart_link register_button\">
                                ĐĂNG NHẬP
                            </button>
                        </div>    
                        <div id=\"search_result\" class=\"search_result\"></div>
                    </div>           
                </div>
            </header>
        ";
    }
?>