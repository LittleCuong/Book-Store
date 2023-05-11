<?php
    echo "<div id=\"modal\" class=\"modal\">
            <div id=\"modal_container\" class=\"modal_container\">
                <div class=\"modal_container-header\">
                    <button id=\"login\" class=\"modal_container_header-option selected\" onclick=\"handleSwitched('login')\">
                        Đăng nhập
                    </button>
                    <button id=\"register\" class=\"modal_container_header-option\" onclick=\"handleSwitched('register')\">
                        Đăng ký
                    </button>
                </div>
                <div class=\"modal_container-body\">
                    <form id=\"login_form\" class=\"body_form form_enable\" method=\"POST\" action=\"../assets/mainPHP/mainPHP.php\">
                        <input placeholder=\"Email\" type=\"email\" class=\"input_modal email_input\" name=\"email\">
                        <input autocomplete placeholder=\"Mật khẩu\" type=\"password\" class=\"input_modal password_input\" name=\"password\">
                        <button class=\"forgot_button\">
                            Quên mật khẩu?
                        </button>
                        <button id=\"form_submit-login\" type=\"submit\" name=\"login\" class=\"submit_button\">Đăng nhập</button>
                    </form>
                    <form id=\"register_form\" class=\"body_form\" method=\"POST\" action=\"../assets/mainPHP/mainPHP.php\">
                        <input placeholder=\"Họ và tên\" type=\"text\" class=\"input_modal email_input\" name=\"name\" required>
                        <input placeholder=\"Email\" type=\"email\" class=\"input_modal email_input\" name=\"email\" required>
                        <input placeholder=\"Địa chỉ\" type=\"text\" class=\"input_modal email_input\" name=\"address\" required>
                        <input autocomplete placeholder=\"Mật khẩu\" type=\"password\" class=\"input_modal password_input\" name=\"password\" required> 
                        <input autocomplete placeholder=\"Nhập lại mật khẩu\" type=\"password\" class=\"input_modal password_input\" name=\"re_password\" required>                             
                        <button id=\"form_submit-register\" type=\"submit\" name=\"register\" class=\"submit_button\">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>  
    ";
?>