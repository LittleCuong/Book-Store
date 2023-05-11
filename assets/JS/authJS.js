window.addEventListener('click', function(e){   
    // Show modal
    const modal = document.getElementById("modal");
    const modalContainer = document.getElementById("modal_container");

    if (document.getElementById("loginButton") !== null) {
        if (document.getElementById("loginButton").contains(e.target) || modalContainer.contains(e.target)) {
            modal.style.display = 'flex';
        } else {
            modal.style.display = 'none';
        }       
    }
});

const handleSwitched = (value) => {
    const login = document.getElementById("login");
    const register = document.getElementById("register");
    const loginForm = document.getElementById("login_form");
    const registerForm = document.getElementById("register_form");

    switch (value) {
        case 'login':
            register.classList.remove("selected");
            registerForm.classList.remove("form_enable");
            login.classList.add("selected");
            loginForm.classList.add("form_enable");
            break;  
        case 'register':
            login.classList.remove("selected");
            loginForm.classList.remove("form_enable");
            register.classList.add("selected");
            registerForm.classList.add("form_enable");
            break;
    }
}

const handleSubmitLogin = (e) => {
    e.preventDefault()
    $.ajax({
        url: './mainPHP/mainPHP.php',
        method: 'POST',
        data: {
            'action': 'login',
            'login': data
        },
        success: function(res) {
            console.log(res);
        }
    })
}

const handleLogOut = () => {
    $.ajax({
        url: '../assets/mainPHP/mainPHP.php',
        method: 'POST',
        data: {'logout': 'logout'},
        success: function(res) {
            if (res == 'success') {
                location.reload();
                window.location.href = '../home/home.php';
            }
        }
    })
}