-+window.addEventListener('click', function(e) {   
    document.getElementById("search_result").contains(e.target) ? undefined : document.getElementById("search_result").style.display = 'none';
})

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

// Show form login
function formLogin() {
    var formElement = document.querySelector(".form");
    formElement.style.display = 'block';
}

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

// Search
const handleSearchProduct = () => {
    $.ajax({
        url: '../assets/mainPHP/mainPHP.php',
        method: 'POST',
        data: {
            // 'action': 'search',
            'search': document.getElementById('search_input-header').value
        },
        success: function(res) {
            document.getElementById('search_result').style.display = 'flex';
            document.getElementById('search_result').innerHTML = res;
        }
    })
}