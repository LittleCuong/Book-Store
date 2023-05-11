// let decreaseBtn = document.getElementById('decrease');
// let increaseBtn = document.getElementById('increase');
let amount = document.getElementById('amount_input')

// decreaseBtn.addEventListener("click", (e) => {
//     e.preventDefault();
//     if (amount.value != 1) {
//         amount.value--;
//     }
// });

// increaseBtn.addEventListener("click", (e) => {
//     e.preventDefault();
//     amount.value++;
// });

const buyProduct = (userID) => {
    switch (userID) {
        case 'none':
            alert('Vui lòng đăng nhập để mua hàng!');
            break;
        default:
            handleShowModalBuy();
            break;
    }
}

const addToCart = (userID, bookID) => {
    switch (userID) {
        case 'none':
            alert('Vui lòng đăng nhập để thêm vào giỏ hàng!');
            break;
        default:
            const infor = {
                'action': 'addToCart',
                'userID': userID,
                'bookID': bookID
            }
        
            $.ajax({
                url: 'detailFunction.php',
                method: 'POST',
                data: infor,
                success: function (res) {
                    switch (res) {
                        case 'existed':
                            alert('Đã có trong giỏ hàng!');
                            break;
                        case 'failed':
                            alert('Vui lòng thử lại sau 1 phút!');
                            break;           
                        default:
                            alert('Đã thêm vào giỏ hàng!');
                            break;
                    }
                }
            })
            break;
    }   
}

// Redirect
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

// Show modal
// const handleShowModal = () => {
//     const modal = document.getElementById("modal");
//     modal.style.display = 'flex';
//     // const productData = {
//             //     'action': 'buy',
//             //     'userID': userID,
//             //     'bookID': bookID,
//             //     'amount': amount.value
//             // }       
//             // $.ajax({
//             //     url: 'detailFunction.php',
//             //     method: 'POST',
//             //     data: productData,
//             //     success: function () {
//             //         alert('Mua hàng thành công!')
//             //     }
//             // })
// }

// window.addEventListener('click', function(e){   
//     // Modal login & register
//     const modal = document.getElementById("modal");
//     const modalContainer = document.getElementById("modal_container");

//     if (document.getElementById("loginButton") !== null) {
//         if (document.getElementById("loginButton").contains(e.target) || modalContainer.contains(e.target)) {
//             modal.style.display = 'flex';
//         } else {
//             modal.style.display = 'none';
//         }       
//     }
// });

const handleShowModalBuy = () => {
    const modal = document.getElementById("modal_buy");
    modal.style.display = 'flex';
}

const handleCloseModal = () => {
    const modal = document.getElementById("modal_buy");
    modal.style.display = 'none';
}

const handleBuyProduct = (userID, productID) => {
    const productData = {
        'action': 'buy',
        'userID': userID,
        'bookID': productID,
        'amount': amount.value
    }       
    $.ajax({
        url: 'detailFunction.php',
        method: 'POST',
        data: productData,
        success: function () {
            alert('Mua hàng thành công!')
            const modal = document.getElementById("modal_buy");
            modal.style.display = 'none';
        }
    })
}

// Switch between login & register
// const handleSwitched = (value) => {
//     const login = document.getElementById("login");
//     const register = document.getElementById("register");
//     const loginForm = document.getElementById("login_form");
//     const registerForm = document.getElementById("register_form");

//     switch (value) {
//         case 'login':
//             register.classList.remove("selected");
//             registerForm.classList.remove("form_enable");
//             login.classList.add("selected");
//             loginForm.classList.add("form_enable");
//             break;  
//         case 'register':
//             login.classList.remove("selected");
//             loginForm.classList.remove("form_enable");
//             register.classList.add("selected");
//             registerForm.classList.add("form_enable");
//             break;
//     }
// }

// const handleSubmitLogin = (e) => {
//     e.preventDefault()
//     $.ajax({
//         url: './mainPHP/mainPHP.php',
//         method: 'POST',
//         data: {'login': data},
//         success: function(res) {
//             console.log(res);
//         }
//     })
// }

// const handleSubmitRegister = (data) => {
//     e.preventDefault()
//     $.ajax({
//         url: './mainPHP/mainPHP.php',
//         method: 'POST',
//         data: {'register': data},
//         success: function(res) {
//             console.log(res);
//         }
//     })
// }