function handleRedirect(data) { 
    switch (data) {
        case 'home':
            window.location.href = '../home/home.php' 
            break;
        case 'cart':
            window.location.href = '../cart/cart.php' 
            break;
    }
}

// Show form login
// function formLogin() {
//     var formElement = document.querySelector(".form");
//     formElement.style.display = 'block';
// }

// Filter by category
function handleChooseCategory(data) {       
    $.ajax({
        url: '../sidebar/sidebarFunction.php',
        method: 'POST',
        data: {'category': data},
        success: function(res) {
            document.getElementById('list').innerHTML = res
        }
    })
}

// Filter
const handleFilterPrice = (data) => {
    $.ajax({
        url: '../filter/filter.php',
        method: 'POST',
        data: {'filter': data},
        success: function(res) {
            document.getElementById('list').innerHTML = res
        }
    })
}

// Show modal
const handleShowModal = () => {
    const modal = document.getElementById("modal");
    modal.style.display = 'flex';
}

// Switch between login & register
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
        data: {'login': data},
        success: function(res) {
            console.log(res);
        }
    })
}

const handleSubmitRegister = () => {
    e.preventDefault()
}